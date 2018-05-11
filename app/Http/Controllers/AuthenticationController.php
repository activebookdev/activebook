<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;
use Postmark\PostmarkClient;

class AuthenticationController extends Controller
{

    public function register(Request $request) {
        //open the register page
        return view('login.register');
    }

    public function submit_register(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:200',
            'email' => 'required|email|unique:users,users_email',
            'password' => 'required|string|min:6',
            'password_confirm' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return json_encode(['status' => 'error']);
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $password_confirm = $request->input('password_confirm');

        if (isset($name) && !empty($name) && isset($email) && !empty($email) && isset($password) && !empty($password) && isset($password_confirm) && !empty($password_confirm) && $password == $password_confirm) {

            $names = explode(' ', $name);
            if (count($names) == 2) {
                $fname = $names[0];
                $lname = $names[1];

                $user_id = DB::table('users')
                            ->insertGetId(['users_fname' => $fname, 'users_lname' => $lname, 'users_email' => $email, 'users_password' => Hash::make($password), 'users_type' => 0, 'users_active' => 0]); //users active = 0 means unverified, 1 means verified and active, and -1 means inactive

                if (isset($user_id) && !empty($user_id)) {
                    DB::table('user_ips')
                        ->insert(['ip_userid' => $user_id, 'ip_ip' => $request->ip()]);

                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $characters_length = strlen($characters);
                    $token = '';
                    for ($i = 0; $i < 10; $i++) {
                        $token .= $characters[rand(0, $characters_length - 1)];
                    }

                    $email_auth = DB::table('user_emails')
                                    ->insertGetId(['emails_userid' => $user_id, 'emails_email' => $email, 'emails_token' => $token, 'emails_verified' => 0, 'emails_active' => 1]);

                    if (isset($email_auth) && $email_auth != null) {
                        //send a verification email
                        $client = new PostmarkClient(env('POSTMARK_CLIENTKEY', ''));

                        $sendResult = $client->sendEmail(
                          "accounts@activebook.com.au",
                          $email,
                          "Welcome to your new Active Book account!",
                          "Congratulations ".$fname." ".$lname." for making your first step towards your fitness and health dreams! Click on the link to verify your email address: ".env('app.url', 'http://localhost')."/verify/".Hash::make($email)."/".$token
                        );

                        //TODO: INTERPRET AND USE sendResult
                        return json_encode(['status' => 'success']);
                    }
                }
            }
        }
        return json_encode(['status' => 'error']);
    }

    public function verify(Request $request, $email=null, $token=null) {
        //if this is an open email verification token, verify it and return the success page
        if ($email != null && $token != null) {
            $verification = DB::table('user_emails')
                                ->where([
                                    ['emails_token', $token],
                                    ['emails_verified', 0],
                                    ['emails_active', 1]
                                ])
                                ->first();
            if (count($verification) == 1) {
                if (Hash::make($verification->emails_email) == $email) {
                    $user = DB::table('users')
                                ->select('users_fname')
                                ->where([
                                    ['users_id', $verification->emails_userid],
                                    ['users_active', 1]
                                ])
                                ->first();

                    if (count($user) == 1) {
                        //we have a match
                        DB::table('user_emails')
                            ->where('emails_id', $verification->emails_id)
                            ->update(['emails_token' => null, 'emails_verified' => 1]);

                        return view('login.verified', ['name' => $user->users_fname]);
                    }
                }
            }
        }
        return redirect('/login'); //TODO: MAYBE REDIRECT TO HOME PAGE INSTEAD??
    }

    public function login(Request $request) {
        //open the login page
        return view('login.login');
    }

    public function submit_login(Request $request) {
        //log the user in and redirect them to their profile (or return error)
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return json_encode(['status' => 'error']);
        }

        $email = $request->input('email');
        $password = $request->input('password');

        if (isset($email) && !empty($email) && isset($password) && !empty($password)) {

            $user = DB::table('users')
                        ->select('users_id', 'users_type', 'users_password')
                        ->where([
                            ['users_email', $email],
                            ['users_active', 1]
                        ])
                        ->first();

            if (!empty($user)) {
                if (Hash::check($password, $user->users_password)) {
                    $ip = $request->ip();
                    $ips = DB::table('user_ips')
                            ->where('ip_userid', $user->users_id)
                            ->get();
                    $ip_match = false;
                    if (count($ips) > 0) {
                        foreach ($ips as $i) {
                            if ($i->ip_ip == $ip) {
                                $ip_match = true;
                                break;
                            }
                        }
                    }

                    if ($ip_match == true) {
                        //this is a valid user, coming from a valid ip address, so log them in
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $characters_length = strlen($characters);
                        $random_string = '';
                        for ($i = 0; $i < 50; $i++) {
                            $random_string .= $characters[rand(0, $characters_length - 1)];
                        }

                        //we now have $random_string, which we will insert into both the session and the database, and our auth middleware will check session vs database on each request
                        DB::table('users')
                            ->where('users_id', $user->users_id)
                            ->update(['users_sessionkey' => $random_string, 'users_sessiontime' => time()]);

                        session(['id' => $user->users_id, 'ip' => $ip, 'key' => $random_string]);

                        return json_encode(['status' => 'success']);
                    } else {
                        //TODO: notify the user that this login attempt is coming from a new computer or location, so send them an email to verify the login (email controller inserts the new ip address into the user_ips table and asks them to login again)
                        return json_encode(['status' => 'error']);
                    }
                }
            }
        }
        return json_encode(['status' => 'error']);
    }

    public function check_logged(Request $request) {
        //check if the user is logged in or not
        $logged = 0;
        if ($request->session()->has('id')) {
            $user_id = $request->session()->get('id');
            $user = DB::table('users')
                        ->select('users_sessionkey', 'users_sessiontime')
                        ->where([
                            ['users_id', $user_id],
                            ['users_active', 1]
                        ])
                        ->first();
            if (!empty($user)) {
                //check that the request ip matches the session ip
                $session_ip = $request->session()->get('ip');
                if ($session_ip == $request->ip()) {
                    //check that the session key matches the one in the database
                    $key = $request->session()->get('key');
                    $db_key = $user->users_sessionkey;
                    if ($db_key != NULL && $key == $db_key) {
                        $current_time = time();
                        $db_time = $user->users_sessiontime;
                        if ($db_time != NULL && $current_time >= $db_time && ($current_time - $db_time) <= (15*60)) {
                            //the user is logged in
                            $logged = 1;
                        }
                    }
                }
            }
        }

        if ($logged == 1) {
            //create the html for the logout button
            $html = "<li><a id=\"logout_button\" style=\"font-size:18px; cursor:pointer; color:white;\">Logout</a></li>";
        } else {
            //create the html for the login and register buttons
            $html = "<li style=\"margin-right:20px;\"><a id=\"login_button\" class=\"nav-link\" href=\"/login\" style=\"font-size:18px;\">Login</a></li>
                            <li><a id=\"register_button\" class=\"nav-link\" href=\"/register\" style=\"font-size:18px;\">Register</a></li>";
        }

        return json_encode(['html' => $html]);
    }

    public function submit_logout(Request $request) {
        //log the user out of their current session
        if ($request->session()->has('id') && $request->session()->has('ip') && $request->session()->has('key')) {
            //we have an active session that we can actually log out of
            $user_id = $request->session()->get('id');

            $request->session()->flush();

            DB::table('users')
                ->where([
                    ['users_id', $user_id],
                    ['users_active', 1]
                ])
                ->update(['users_sessionkey' => NULL, 'users_sessiontime' => NULL]);

            return json_encode(['status' => 'success']);
        }
    }

    public function check_session(Request $request) {
        //check that the user's session matches the page they're currently on
        $href = $request->input('href');
        if (isset($href) && !empty($href)) {
            $href = ltrim($href, '/');

            //define the pages that are logged-in only
            $logged_pages = ['profile', 'book', 'data'];

            if (in_array($href, $logged_pages)) {
                //we need to check that the user is logged in
                $logged = 0;
                if ($request->session()->has('id')) {
                    $user_id = $request->session()->get('id');
                    $user = DB::table('users')
                                ->select('users_sessionkey', 'users_sessiontime')
                                ->where([
                                    ['users_id', $user_id],
                                    ['users_active', 1]
                                ])
                                ->first();
                    if (!empty($user)) {
                        //check that the request ip matches the session ip
                        $session_ip = $request->session()->get('ip');
                        if ($session_ip == $request->ip()) {
                            //check that the session key matches the one in the database
                            $key = $request->session()->get('key');
                            $db_key = $user->users_sessionkey;
                            if ($db_key != NULL && $key == $db_key) {
                                $current_time = time();
                                $db_time = $user->users_sessiontime;
                                if ($db_time != NULL && $current_time >= $db_time && ($current_time - $db_time) <= (10*60)) {
                                    //the user is logged in
                                    $logged = 1;
                                } else if ($db_time != NULL && $current_time >= $db_time && ($current_time - $db_time) <= (15*60)) {
                                    //the user's session is about to expire, so refresh it
                                    $logged = 2;
                                }
                            }
                        }
                    }
                }

                if ($logged == 1) {
                    return json_encode(['status' => 'ok']);
                } else if ($logged == 2) {
                    //the session needs to be refreshed
                    $time = time();
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $characters_length = strlen($characters);
                    $random_string = '';
                    for ($i = 0; $i < 50; $i++) {
                        $random_string .= $characters[rand(0, $characters_length - 1)];
                    }

                    DB::table('users')
                        ->where('users_id', $user_id)
                        ->update(['users_sessionkey' => $random_string, 'users_sessiontime' => $time]);

                    session(['id' => $users_id, 'ip' => $request->ip(), 'key' => $random_string]);

                    return json_encode(['status' => 'ok']);
                }
            } else {
                //we don't need to be logged in for this page, so its fine
                return json_encode(['status' => 'ok']);
            }
        }
        return json_encode(['status' => 'not_ok']);
    }
}
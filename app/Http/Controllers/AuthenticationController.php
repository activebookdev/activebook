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
            'email' => 'required|email', //|unique:users,users_email
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
            if (!is_null($names) && count($names) == 2) {
                $fname = $names[0];
                $lname = $names[1];

                //first, lets check that the user's email is unique in our system (can't check unique name because people can have the same name)
                $email_check = DB::table('user_emails')
                                ->select('emails_userid', 'emails_verified')
                                ->where([
                                    ['emails_email', $email],
                                    ['emails_active', 1]
                                ])
                                ->first();
                if (!is_null($email_check)) {
                    //TODO: because of this check, when a user deletes their account, don't just set their user record to inactive, set all subrecords to inactive too
                    //TODO: if an email verification stays unverified for > 24 hrs, then delete it from the DB (and delete the unverified user?)
                    $user = DB::table('users')
                                ->select('users_fname', 'users_lname')
                                ->where([
                                    ['users_id', $email_check->emails_userid],
                                    ['users_active', 1]
                                ])
                                ->first();
                    if (!is_null($user)) {
                        return json_encode(['status' => 'exists', 'verified' => $email_check->emails_verified, 'initials' => substr($user->users_fname,0,1).'.'.substr($user->users_lname,0,1)]);
                    }
                    return json_encode(['status' => 'exists', 'verified' => $email_check->emails_verified, 'initials' => 'unknown']);
                }

                $user_id = DB::table('users')
                            ->insertGetId(['users_fname' => $fname, 'users_lname' => $lname, 'users_email' => $email, 'users_password' => Hash::make($password), 'users_type' => 0, 'users_createdat' => time(), 'users_active' => 0]); //users active = 0 means unverified, 1 means verified and active, and -1 means inactive

                if (isset($user_id) && !empty($user_id)) {
                    DB::table('user_ips')
                        ->insert(['ip_userid' => $user_id, 'ip_ip' => $request->ip(), 'ip_token' => 'initial', 'ip_verified' => 0]);

                    $token = generate_token(30);

                    $email_auth = DB::table('user_emails')
                                    ->insertGetId(['emails_userid' => $user_id, 'emails_email' => $email, 'emails_token' => $token, 'emails_verified' => 0, 'emails_active' => 1]);

                    if (isset($email_auth) && !is_null($email_auth)) {
                        //send a verification email
                        $client = new PostmarkClient(env('POSTMARK_CLIENTKEY', ''));

                        $sendResult = $client->sendEmail(
                          "accounts@activebook.com.au",
                          $email,
                          "Welcome to your new Active Book account!",
                          "Congratulations ".$fname." ".$lname." for making your first step towards your fitness and health dreams! Click on the link to verify your email address: ".env('APP_URL', 'http://localhost:8000')."/verify/".(string)$user_id."/".$token
                        );
                        $sendResult = $client->sendEmailWithTemplate(
                            "accounts@activebook.com.au",
                            $email,
                            7269544,
                            [
                                "name" => $fname,
                                "verify_url" => env('APP_URL', 'http://localhost:8000')."/verify/".(string)$user_id."/".$token,
                                "support_email" => "support@activebook.com.au",
                                "phone_number" => "0426884710"
                            ]
                        );
                        //TODO: INTERPRET AND USE sendResult

                        return json_encode(['status' => 'success']);
                    }
                }
            }
        }
        return json_encode(['status' => 'error']);
    }

    public function verify(Request $request, $user_id=null, $token=null) {
        //TODO: ADD time COLUMN TO VERIFICATION TABLE AND PUT 6HR LIMIT UNTIL THE EMAIL VERIFICATION IS CLEARED
        //if this is an open email verification token, verify it and return the success page
        if ($user_id != null && $token != null) {
            $user = DB::table('users')
                        ->where([
                            ['users_id', $user_id],
                            ['users_active', 0] //this account is pending email verification
                        ])
                        ->first();
            if (!is_null($user)) {
                //the user exists
                $verification = DB::table('user_emails')
                                    ->where([
                                        ['emails_userid', $user_id],
                                        ['emails_token', $token],
                                        ['emails_verified', 0],
                                        ['emails_active', 1]
                                    ])
                                    ->first();
                if (!is_null($verification)) {
                    //we have a match
                    DB::table('user_emails')
                        ->where('emails_id', $verification->emails_id)
                        ->update(['emails_token' => null, 'emails_verified' => 1]);

                    //set the user account to active
                    DB::table('users')
                        ->where('users_id', $user_id)
                        ->update(['users_active' => 1]);

                    //set both the initial and current ips to verified for this user
                    $initial = DB::table('user_ips')
                                ->where([
                                    ['ip_userid', $user->users_id],
                                    ['ip_token', 'initial'],
                                ])
                                ->first();
                    if (!is_null($initial)) {
                        if ($initial->ip_ip == $request->ip()) {
                            //this verification is coming from the original register ip, so only set this one to verified
                            DB::table('user_ips')
                                ->where('ip_id', $initial->ip_id)
                                ->update(['ip_verified' => 1]);
                        } else {
                            //this verification is coming from a new ip so set both the original and this one to verified
                            DB::table('user_ips')
                                ->where('ip_id', $initial->ip_id)
                                ->update(['ip_verified' => 1]);
                            DB::table('user_ips')
                                ->insert(['ip_userid' => $user->users_id, 'ip_ip' => $request->ip(), 'ip_verified' => 1]);
                        }
                    }
                    return view('login.verified', ['name' => $user->users_fname, 'type' => 0]);
                }
            }
        }
        return redirect('/');
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
                        ->select('users_id', 'users_type', 'users_password', 'users_active')
                        ->where('users_email', $email)
                        ->first();

            if (!empty($user)) {
                if (Hash::check($password, $user->users_password)) {
                    //now we need to check whether the user has activated their account
                    if ($user->users_active == 1) {
                        $ip = $request->ip();
                        $ip_check = DB::table('user_ips')
                                    ->where([
                                        ['ip_userid', $user->users_id],
                                        ['ip_ip', $ip]
                                    ])
                                    ->first();

                        if (!is_null($ip_check)) {
                            if ($ip_check->ip_verified == 1) {
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

                                return json_encode(['status' => 'success', 'user_id' => $user->users_id]);
                            } else {
                                //the user has already tried to login from this IP, but hasnt verified it, so re-send the email
                                //TODO: CHECK THIS IS THE BEST COURSE OF ACTION
                                $client = new PostmarkClient(env('POSTMARK_CLIENTKEY', ''));

                                $sendResult = $client->sendEmail(
                                  "accounts@activebook.com.au",
                                  $email,
                                  "Login Attempt from Unknown Location",
                                  "An repeated attempt to log into your account was recently made from an unrecognised location, that hasn't yet been verified. For your protection, please verify that this login is genuine by clicking the link below, and then proceed to login as normal.\n".env('APP_URL', 'http://localhost')."/authenticate/".$user->users_id."/".$ip_check->ip_token."\n If this wasn't you, then please either contact our support team or just ignore this email - your account is secure. Thankyou for your assistance."
                                );
                                return json_encode(['status' => 'new_ip']);
                            }
                        } else {
                            //this is a new IP address, so require email authentication
                            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            $characters_length = strlen($characters);
                            $random_string = '';
                            for ($i = 0; $i < 20; $i++) {
                                $random_string .= $characters[rand(0, $characters_length - 1)];
                            }

                            $new_ip = DB::table('user_ips')
                                        ->insertGetId(['ip_userid' => $user->users_id, 'ip_ip' => $ip, 'ip_token' => $random_string, 'ip_verified' => 0]);

                            if (isset($new_ip) && !is_null($new_ip)) {
                                //email the user to have them verify their identity
                                $client = new PostmarkClient(env('POSTMARK_CLIENTKEY', ''));

                                $sendResult = $client->sendEmail(
                                  "accounts@activebook.com.au",
                                  $email,
                                  "Login Attempt from Unknown Location",
                                  "An attempt to log into your account was recently made from a new location. For your protection, please verify that this login is genuine by clicking the link below, and then proceed to login as normal.\n".env('APP_URL', 'http://localhost')."/authenticate/".$user->users_id."/".$random_string."\n If this wasn't you, then please either contact our support team or just ignore this email - your account is secure. Thankyou for your assistance."
                                );
                                return json_encode(['status' => 'new_ip']);
                            }
                        }
                    } else {
                        return json_encode(['status' => 'inactive']);
                    }
                } else {
                    return json_encode(['status' => 'wrong_password']);
                }
            } else {
                return json_encode(['status' => 'no_account']);
            }
        }
        return json_encode(['status' => 'error']);
    }

    public function authenticate(Request $request, $user_id = null, $token = null) {
        if ($user_id != null && $token != null) {
            $user = DB::table('users')
                        ->where([
                            ['users_id', $user_id],
                            ['users_active', 1]
                        ])
                        ->first();
            if (!is_null($user)) {
                //the user exists
                $authentication = DB::table('user_ips')
                                    ->where([
                                        ['ip_userid', $user_id],
                                        ['ip_token', $token],
                                        ['ip_verified', 0]
                                    ])
                                    ->first();
                if (!is_null($authentication)) {
                    //we have a match, so authenticate the ip
                    DB::table('user_ips')
                        ->where('ip_id', $authentication->ip_id)
                        ->update(['ip_token' => null, 'ip_verified' => 1]);

                    if ($request->ip() != $authentication->ip_ip) {
                        //if the current ip differs from the original one (and all others verified for the account), verify it too
                        $ip_check = DB::table('user_ips')
                                        ->where([
                                            ['ip_userid', $user_id],
                                            ['ip_ip', $request->ip()]
                                        ])
                                        ->first();
                        if (!is_null($ip_check)) {
                            if ($ip_check->ip_verified == 0) {
                                DB::table('user_ips')
                                    ->where('ip_id', $ip_check->ip_id)
                                    ->update(['ip_token' => null, 'ip_verified' => 1]);
                            }
                        } else {
                            DB::table('user_ips')
                                ->insert(['ip_userid' => $user_id, 'ip_ip' => $request->ip(), 'ip_token' => null, 'ip_verified' => 1]);
                        }
                    }
                    return redirect('/login');
                }
            }
        }
        return redirect('/');
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

    public function submit_password_reset(Request $request) {
        $email = $request->input('email');
        if (isset($email) && !empty($email)) {
            $user = DB::table('users')
                        ->where('users_email', $email)
                        ->first();
            if (!is_null($user)) {
                if ($user->users_active == 1) {
                    //the user exists and is active, so send the password reset email
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $characters_length = strlen($characters);
                    $random_string = '';
                    for ($i = 0; $i < 30; $i++) {
                        $random_string .= $characters[rand(0, $characters_length - 1)];
                    }

                    //make all previous pwresets for the user inactive
                    DB::table('user_passwordresets')
                        ->where([
                            ['pwresets_userid', $user->users_id],
                            ['pwresets_status', 0]
                        ])
                        ->update(['pwresets_token' => NULL, 'pwresets_status' => 2]);

                    //make a password reset record in the DB
                    $pwreset = DB::table('user_passwordresets')
                                ->insertGetId(['pwresets_userid' => $user->users_id, 'pwresets_token' => $random_string, 'pwresets_created' => time(), 'pwresets_status' => 0]);

                    if (isset($pwreset) && !is_null($pwreset)) {
                        //email the user to have them verify their identity
                        $client = new PostmarkClient(env('POSTMARK_CLIENTKEY', ''));

                        $sendResult = $client->sendEmail(
                          "accounts@activebook.com.au",
                          $email,
                          "Reset your Password",
                          "Reset your Active Book password by clicking the link below.\n".env('APP_URL', 'http://localhost')."/reset/".$user->users_id."/".$random_string."\n If this wasn't you, then please either contact our support team or just ignore this email - your account is secure. Thankyou for your assistance."
                        );
                        return json_encode(['status' => 'success']);
                    }
                } else {
                    return json_encode(['status' => 'inactive']);
                }
            } else {
                return json_encode(['status' => 'no_account']);
            }
        }
        return json_encode(['status' => 'error']);
    }

    public function reset(Request $request, $user_id = null, $token = null) {
        if (!is_null($user_id) && !is_null($token)) {
            $user = DB::table('users')
                        ->where([
                            ['users_id', $user_id],
                            ['users_active', 1]
                        ])
                        ->first();
            if (!is_null($user)) {
                $reset = DB::table('user_passwordresets')
                            ->where([
                                ['pwresets_userid', $user_id],
                                ['pwresets_token', $token],
                                ['pwresets_created', '>=', time()-2*60*60], //reset link only active for 2 hrs
                                ['pwresets_status', 0]
                            ])
                            ->first();
                if (!is_null($reset)) {
                    //we are allowed to reset our password
                    return view('password_reset');
                }
            }
        }
        return redirect('/');
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
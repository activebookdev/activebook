<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Validator;
use Postmark\PostmarkClient;

class ProfileController extends Controller
{
	//this controller manages both the client and trainer profile pages (viewing by others and editing by user and admin)
    public function profile(Request $request, $user_id = null) {
    	if (!is_null($user_id)) {
    		//this page can be viewed by users whether they are logged in or not, but check for an owner/admin session for editing rights
    		$user = DB::table('users')
    					->where([
    						['users_id', $user_id],
    						['users_active', 1]
    					])
    					->first();
    		if (!is_null($user)) {
    			//the user exists, so lets decide what type of profile page to display
    			if ($user->users_type == 0) {
    				//the user is a client, so we need their name, age, picture, bio, recently used trainers, and basic stats
    				$name = $user->users_fname.' '.$user->users_lname;
    				$age = user_get_age($user->users_dob);
    				$picture_name = user_get_pictureurl($user_id);
    				$bio = $user->users_bio;
    				if (is_null($bio) || empty($bio)) {
    					$bio = '';
    				}
                    $member_time = user_get_membertime($user_id);
    				$recent_trainers = user_get_recenttrainers($user_id);
    				$stats = user_get_stats($user_id);

                    $access = 0;
                    if ($request->session()->has('id') && $user_id = $request->session()->get('id')) {
                        $access = 1;
                    }

    				return view('activebook_clientprofile', ['user_id' => $user_id, 'name' => $name, 'age' => $age, 'picture_name' => $picture_name, 'bio' => $bio, 'member_time' => $member_time, 'recent_trainers' => $recent_trainers, 'stats' => $stats, 'access' => $access, 'map_api_key' => env('MAP_API_KEY', '')]);

    			} else if ($user->users_type == 1) {
    				//the user is a trainer
    			}
    		}
    	}
    	return redirect('/');
    }

    public function get_picture(Request $request, $picture_name = null) {
        if (!is_null($picture_name)) {
            return Redirect::to('https://s3-ap-southeast-2.amazonaws.com/activebook-bucket/pictures/'.$picture_name);
        }
        return redirect('/');
    }

    public function get_user_bio(Request $request) {
        $bio_user_id = $request->input('user_id');
        $log_user_id = $request->session()->get('id');

        if (isset($bio_user_id) && !empty($bio_user_id) && isset($log_user_id) && !empty($log_user_id) && $bio_user_id == $log_user_id) {
            //the user is logged in as the requested bio user
            $user = DB::table('users')
                        ->select('users_bio')
                        ->where([
                            ['users_id', $bio_user_id],
                            ['users_active', 1]
                        ])
                        ->first();
            if (!is_null($user)) {
                return json_encode(['status' =>  'success', 'bio' => $user->users_bio]);
            }
        }
        return json_encode(['status' => 'error']);
    }

    public function submit_user_bio(Request $request) {
        $bio_user_id = $request->input('user_id');
        $bio = $request->input('bio');
        $log_user_id = $request->session()->get('id');

        if (isset($bio_user_id) && !empty($bio_user_id) && isset($log_user_id) && !empty($log_user_id) && isset($bio) && $bio_user_id == $log_user_id) {
            if (empty($bio) || is_null($bio)) {
                $bio = '';
            }

            $user = DB::table('users')
                        ->select('users_bio')
                        ->where([
                            ['users_id', $bio_user_id],
                            ['users_active', 1]
                        ])
                        ->first();
            if (!is_null($user)) {
                //update the user's bio
                DB::table('users')->where('users_id', $bio_user_id)->update(['users_bio' => $bio]);
                return json_encode(['status' => 'success', 'bio' => $bio]);
            }
        }
        return json_encode(['status' => 'error']);
    }

    public function submit_user_profilepic(Request $request) {
        //the user has uploaded an image (.jpeg or .jpg or .png), so we want to make it their new profile pic and store it in our s3 bucket, returning the url to it
        $user_id = $request->session()->get('id'); //a user can never upload a file for anyone but themselves
        foreach ($request->files as $f) { //TODO: RESTRICT NUMBER OF FILES TO 1 ONLY
            $file = $f[0];
            break;
        }
        if (isset($user_id) && !empty($user_id) && isset($file) && !empty($file) && $file->getError() == 0 && $file->getSize() <= 3000000 && $user_id = $request->session()->get('id')) {
            DB::table('user_pictures')
                ->where([
                    ['pictures_userid', $user_id],
                    ['pictures_active', 1]
                ])
                ->update(['pictures_active' => 0]);

            $picture_id = DB::table('user_pictures')
                        ->insertGetId(['pictures_userid' => $user_id, 'pictures_active' => 1, 'pictures_filetype' => $file->getClientOriginalExtension()]);

            /*
            ["mimeType" => "image/jpeg", "size" => 110755, "error" => 0, "pathName" => "/tmp/phpf4lk5X", "fileName" => "phpf4lk5X"];
            $file->getRealPath();
            $file->getClientOriginalName();
            $file->getClientOriginalExtension();
            $file->getSize();
            $file->getMimeType();
            */

            //now we want to store the file with name picture_(picture_id) in our S3 bucket
            Storage::putFileAs('pictures', new File($file->getRealPath()), 'picture_'.$picture_id.'.'.$file->getClientOriginalExtension(), 'public');

            return json_encode(['status' => 'success']);
        }
        return json_encode(['status' => 'error']);
    }

    public function get_user_info(Request $request) {
        $user_id = $request->input('user_id');

        if (isset($user_id) && !empty($user_id) && $request->session()->has('id') && $user_id == $request->session()->get('id')) {
            $user = DB::table('users')
                        ->where([
                            ['users_id', $user_id],
                            ['users_type', 0],
                            ['users_active', 1]
                        ])
                        ->first();

            if (!is_null($user)) {
                $address_number = '';
                if (isset($user->users_address_number) && !is_null($user->users_address_number)) {
                    $address_number = $user->users_address_number;
                }

                $address_streetname = '';
                if (isset($user->users_address_streetname) && !is_null($user->users_address_streetname)) {
                    $address_streetname = $user->users_address_streetname;
                }

                $address_suburb = '';
                if (isset($user->users_address_suburb) && !is_null($user->users_address_suburb)) {
                    $address_suburb = $user->users_address_suburb;
                }

                $address_postcode = '';
                if (isset($user->users_address_postcode) && !is_null($user->users_address_postcode)) {
                    $address_postcode = $user->users_address_postcode;
                }

                $address_state = '';
                if (isset($user->users_address_state) && !is_null($user->users_address_state)) {
                    $address_state = $user->users_address_state;
                }

                $dob = '';
                if (isset($user->users_dob) && !is_null($user->users_dob)) {
                    $dob = $user->users_dob;
                }

                return json_encode(['status' => 'success', 'fname' => $user->users_fname, 'lname' => $user->users_lname, 'email' => $user->users_email, 'address_number' => $address_number, 'address_streetname' => $address_streetname, 'address_suburb' => $address_suburb, 'address_postcode' => $address_postcode, 'address_state' => $address_state, 'dob' => $dob]);
            }
        }
        return json_encode(['status' => 'error']);
    }

    public function submit_user_info(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'dob' => 'required|string|min:10|max:10|date_format:d/m/Y'
        ]);

        if ($validator->fails()) {
            return json_encode(['status' => 'error']);
        }

        $user_id = $request->input('user_id');
        $dob = $request->input('dob');
        $email = $request->input('email');
        $address_number = $request->input('address_number');
        $address_streetname = $request->input('address_streetname');
        $address_suburb = $request->input('address_suburb');
        $address_state = $request->input('address_state');
        $address_postcode = $request->input('address_postcode');

        if (check_input([$user_id, $dob, $email, $address_number, $address_streetname, $address_suburb, $address_state, $address_postcode]) && $request->session()->has('id') && $user_id == $request->session()->get('id')) {
            $user = DB::table('users')
                        ->where([
                            ['users_id', $user_id],
                            ['users_active', 1]
                        ])
                        ->first();
            if (!is_null($user)) {
                //TODO: USE GOOGLE MAPS API TO CHECK THAT ADDRESS COMPONENTS FORM A REAL, VALID ADDRESS

                //if dob or address are updated, mark this as true
                $update_check = 0;
                if ($dob != $user->users_dob || $address_number != $user->users_address_number || $address_streetname != $user->users_address_streetname || $address_suburb != $user->users_address_suburb || $address_state != $user->users_address_state || $address_postcode != $user->users_address_postcode) {
                    $update_check = 1;
                }

                //update the user's info
                DB::table('users')
                    ->where('users_id', $user_id)
                    ->update(['users_dob' => $dob, 'users_address_number' => $address_number, 'users_address_streetname' => $address_streetname, 'users_address_suburb' => $address_suburb, 'users_address_state' => $address_state, 'users_address_postcode' => $address_postcode]);
 
                if ($email != $user->users_email) {
                    //the user has changed their email, so we need to create a record of this, then verify it
                    $email_check = DB::table('user_emails')
                                ->select('emails_userid', 'emails_verified')
                                ->where([
                                    ['emails_email', $email],
                                    ['emails_active', 1]
                                ])
                                ->first();
                    if (!is_null($email_check)) {
                        //this email is already registered to another account
                        return json_encode(['status' => 'email_exists', 'extra' => $update_check]);
                    } else {
                        $token = generate_token(30);

                        $email_auth = DB::table('user_emails')
                                        ->insertGetId(['emails_userid' => $user_id, 'emails_email' => $email, 'emails_token' => $token, 'emails_verified' => 0, 'emails_active' => 0]); //this isn't the user's primary email until it is verified

                        if (isset($email_auth) && !is_null($email_auth)) {
                            //send a verification email
                            $client = new PostmarkClient(env('POSTMARK_CLIENTKEY', ''));

                            $sendResult = $client->sendEmailWithTemplate(
                                "accounts@activebook.com.au",
                                $email,
                                7324181,
                                [
                                    "name" => $user->users_fname,
                                    "verify_url" => env('APP_URL', 'http://localhost:8000')."/verify_add/".(string)$user_id."/".$token,
                                    "support_email" => "support@activebook.com.au", //TODO: CREATE THIS EMAIL AND INTEGRATE INTO ADMIN DASHBOARD
                                    "phone_number" => "0426884710"
                                ]
                            );
                            //TODO: INTERPRET AND USE sendResult
                        }
                    }
                }
                return json_encode(['status' => 'success']);
            }
        }
        return json_encode(['status' => 'error']);
    }

    public function verify_add(Request $request, $user_id=null, $token=null) {
        //TODO: ADD time COLUMN TO VERIFICATION TABLE AND PUT 6HR LIMIT UNTIL THE EMAIL VERIFICATION IS CLEARED
        //verify the new email and make it the user's default
        if ($user_id != null && $token != null) {
            $user = DB::table('users')
                        ->where([
                            ['users_id', $user_id],
                            ['users_active', 1]
                        ])
                        ->first();
            if (!is_null($user)) {
                //the user exists
                $verification = DB::table('user_emails')
                                    ->where([
                                        ['emails_userid', $user_id],
                                        ['emails_token', $token],
                                        ['emails_verified', 0],
                                        ['emails_active', 0]
                                    ])
                                    ->first();
                if (!is_null($verification)) {
                    //we have a match
                    DB::table('user_emails')
                        ->where([
                            ['emails_userid', $user_id],
                            ['emails_active', 1]
                        ])
                        ->update(['emails_active' => 0]);

                    DB::table('user_emails')
                        ->where('emails_id', $verification->emails_id)
                        ->update(['emails_token' => null, 'emails_verified' => 1, 'emails_active' => 1]);

                    //set the user account to active
                    DB::table('users')
                        ->where('users_id', $user_id)
                        ->update(['users_email' => $verification->emails_email]);

                    return view('login.verified', ['name' => $user->users_fname, 'type' => 1]);
                }
            }
        }
        return redirect('/');
    }

    public function testcode(Request $request) {}
}
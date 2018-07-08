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
                    if ($request->session()->has('id') && $user_id == $request->session()->get('id')) {
                        $access = 1;
                    }

    				return view('activebook_clientprofile', ['user_id' => $user_id, 'name' => $name, 'age' => $age, 'picture_name' => $picture_name, 'bio' => $bio, 'member_time' => $member_time, 'recent_trainers' => $recent_trainers, 'stats' => $stats, 'access' => $access, 'map_api_key' => env('MAP_API_KEY', '')]);

    			} else if ($user->users_type == 1) {
    				//the user is a trainer
                    $name = $user->users_fname.' '.$user->users_lname;
                    $age = user_get_age($user->users_dob);
                    $picture_name = user_get_pictureurl($user_id);
                    $bio = $user->users_bio;
                    if (is_null($bio) || empty($bio)) {
                        $bio = '';
                    }
                    $locations = trainer_get_locations($user_id);
                    $member_time = user_get_membertime($user_id);
                    $baserate = trainer_get_baserate($user_id);
                    $stats = trainer_get_stats($user_id);
                    $socials = trainer_get_socials($user_id);
                    $reviews = trainer_get_reviews($user_id);
                    $activities = trainer_get_activities($user_id);
                    $years = timetable_get_years();

                    $access = 0;
                    if ($request->session()->has('id') && $user_id == $request->session()->get('id')) {
                        $access = 1;
                    }

                    return view('activebook_profile', ['user_id' => $user_id, 'name' => $name, 'age' => $age, 'picture_name' => $picture_name, 'bio' => $bio, 'locations' => $locations, 'member_time' => $member_time, 'baserate' => $baserate, 'stats' => $stats, 'socials' => $socials, 'reviews' => $reviews, 'activities' => $activities, 'years' => $years, 'access' => $access, 'map_api_key' => env('MAP_API_KEY', '')]);
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

    public function timetable_get_months(Request $request) {
        $request_year = $request->input('year');

        if (isset($request_year) && !empty($request_year)) {
            $request_year = (string)$request_year;
            $year = (string)date('Y');
            $month = (int)date('n');

            $allowable_monthsyears = [$year => []];
            for ($i = 0; $i < 6; $i++) {
                if ($month > 12) {
                    //we need to move onto the next year
                    $year = (int)$year;
                    $year++;
                    $year = (string)$year;
                    $month = 1;
                }
                $allowable_monthsyears[$year][] = $month;
                $month++;
            }

            //now we have an array of the months that are allowed to be booked for each year that could be selected
            $html = '';
            $months = $allowable_monthsyears[$request_year];
            if (!is_null($months) && count($months) > 0) {
                $conversion = ['', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                foreach ($months as $month) {
                    $html .= '<option value="'.$month.'">'.$conversion[$month].'</option>';
                }
            }
            return json_encode(['status' => 'success', 'html' => $html]);
        }
        return json_encode(['status' => 'error']);
    }

    public function timetable_get_weeks(Request $request) {
        $year = $request->input('year');
        $month = $request->input('month');

        if (isset($year) && !empty($year) && isset($month) && !empty($month)) {
            //get every monday of this month and then generate all of the weeks that start in the month, returning these as select options
            $mondays = array();
            $type = CAL_GREGORIAN;
            $day_count = cal_days_in_month($type, $month, $year); //the number of days in that month

            //loop through all of the days in the month
            for ($i = 1; $i <= $day_count; $i++) {
                $date = $year.'/'.$month.'/'.$i; //format date
                $get_name = date('l', strtotime($date)); //get week day
                $day_name = substr($get_name, 0, 3); // trim day name to 3 chars
                if ($day_name == 'Mon') {
                    $mondays[] = $i;
                }
            }

            //now we have an array of all of the mondays, turn these into the week options
            $html = '';
            foreach ($mondays as $m) {
                $s = $m+6;
                if ($s > $day_count) {
                    $s -= $day_count;
                }
                $week = $m.'-'.$s;
                if ($m == 1 || $m == 21 || $m == 31) {
                    $mon_str = $m.'st';
                } else if ($m == 2 || $m == 22) {
                    $mon_str = $m.'nd';
                } else if ($m == 3 || $m == 23) {
                    $mon_str = $m.'rd';
                } else {
                    $mon_str = $m.'th';
                }
                if ($s == 1 || $s == 21 || $s == 31) {
                    $sun_str = $s.'st';
                } else if ($s == 2 || $s == 22) {
                    $sun_str = $s.'nd';
                } else if ($s == 3 || $s == 23) {
                    $sun_str = $s.'rd';
                } else {
                    $sun_str = $s.'th';
                }
                $html .= '<option value="'.$week.'">'.$mon_str.'-'.$sun_str.'</option>';
            }
            return json_encode(['status' => 'success', 'html' => $html]);
        }
        return json_encode(['status' => 'error']);
    }

    public function timetable_display(Request $request) {
        $user_id = $request->input('user_id');
        $year = $request->input('year');
        $month = $request->input('month');
        $week = $request->input('week');

        //timetable_rules: rules_id, rules_userid, rules_type, rules_value, rules_rule, rules_active (e.g: 1, 21, 2, 'tues:10/06/2018-04/09/2018', '9-11,15-19', 1)
            //rule_type 0: hours apply globally to day(s) in rules_value, lowest priority: 'mon,wed,thu', '9-11,15-19 (these are the range of session START times)'
            //rule_type 1: hours apply to days in rules_value between period in rules_value, higher priority: 'tues:10/06/2018-04/09/2018', '9-11,15-19'
            //rule type 2: hours apply to specific date in rules_value, highest priority: '04/09/2018', '9-11,15-19'
            //NOTE THAT RULES THAT NO LONGER APPLY (DATE RANGE HAS PASSED) SHOULD BE SET TO INACTIVE TO AS NOT TO SLOW THE RULE SCAN PROCESS BELOW
        //payment_modifiers: modifiers_id, modifiers_userid, modifiers_type, modifiers_value, modifiers_rule (e.g: 1, 21, 1, '<10am', '+$10')
            //modifiers_type 0: baserate of user for acitivity given in modifiers_value: '23' (activity_id), '$55'
            //modifiers_type 1: global rate change of user for time given in modifiers_value: '<10am', '+$10'
            //modifiers_type 2: global rate change for specific weekday(s): 'sat,sun', '+$5'
            //modifiers_type 3: rate change for specific date: '04/09/2018', '+$15'

        if (check_input([$user_id, $year, $month, $week])) {
            //verify that the user is a trainer, verify that the dates given are valid (within 6 months), load the timetable of the trainer and return it in the data object
            $trainer = DB::table('users')
                        ->where([
                            ['users_id', $user_id],
                            ['users_type', 1],
                            ['users_active', 1]
                        ])
                        ->first();
            if (!is_null($trainer)) {
                $dates = timetable_get_dates($year, $month, $week);
                if ($dates != false && count($dates) == 2) {
                    $start_date = $dates[0]; //both of these are valid dates in dd/mm/YYYY format
                    $end_date = $dates[1];

                    $week_dates = timetable_get_week_dates($start_date, $end_date); //mon is index 0, tue is index 1, .. , sun is index 6
                    $weekday_names = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];
                    if ($week_dates != false && count($week_dates) == 7) {
                        //by default, the trainer has no working hours, and timetable_rules adds on top of this
                        $data = [];
                        for ($i = 6; $i < 22; $i++) {
                            if ($i < 12) {
                                $hour = $i.'am';
                            } else if ($i == 12) {
                                $hour = $i.'pm';
                            } else {
                                $hour = ($i-12).'pm';
                            }
                            $data[] = ['time' => $hour, 'mon' => 'inactive', 'tue' => 'inactive', 'wed' => 'inactive', 'thu' => 'inactive', 'fri' => 'inactive', 'sat' => 'inactive', 'sun' => 'inactive']; //index for xam/pm is x => 24hr time => data[x-6]
                        }
                        //now data has all of the cells filled out as inactive

                        $rules = DB::table('timetable_rules')
                                    ->where([
                                        ['rules_userid', $user_id],
                                        ['rules_active', 1]
                                    ])
                                    ->orderBy('rules_type', 'asc')
                                    ->get();
                        if (!is_null($rules) && count($rules) > 0) {
                            foreach ($rules as $rule) {
                                //apply the rule to the data
                                if ($rule->rules_type == 0) {
                                    //this is a global rule
                                    $days_arr = explode(',', $rule->rules_value);
                                    if (count($days_arr) > 0) {
                                        $hours_to_apply = hours_rangetoarray($rule->rules_rule);
                                        if (count($hours_to_apply) > 0) {
                                            foreach ($hours_to_apply as $hour) {
                                                foreach ($days_arr as $day) {
                                                    if (isset($data[$hour-6][$day]) && !empty($data[$hour-6][$day])) {
                                                        $data[$hour-6][$day] = 'active';
                                                    }
                                                }
                                            }
                                        }
                                    }
                                } else if ($rule->rules_type == 1) {
                                    //this is a date-restriced rule
                                    $value = explode(':', $rule->rules_value);
                                    if (count($value) == 2) {
                                        $days_arr = explode(',', $value[0]);
                                        if (count($days_arr) > 0) {
                                            $date_range = explode('-', $value[1]);
                                            if (!($date_range[1] < $start_date) && !($date_range[0] > $end_date)) {
                                                //there is some overlap between the days in this rule and those in our selected week, so figure out what these days are
                                                $all_dates = daterange_get_dates($date_range);
                                                $overlap = array_intersect($all_dates, $week_dates);
                                                $days_to_apply = [];
                                                foreach ($overlap as $o) {
                                                    $index = array_search($o, $week_dates);
                                                    $day_str = $weekday_names[$index];
                                                    $days_to_apply[] = $day_str;
                                                }
                                                $days_to_apply = array_intersect($days_to_apply, $days_arr);
                                                //because this rule will override any globally set hours on these days, reset them to inactive before applying the hours
                                                foreach ($days_to_apply as $day) {
                                                    foreach ($data as $hour) {
                                                        $hour[$day] = 'inactive';
                                                    }
                                                }
                                                $hours_to_apply = hours_rangetoarray($rule->rules_rule);
                                                if (count($hours_to_apply) > 0) {
                                                    foreach ($hours_to_apply as $hour) {
                                                        foreach ($days_to_apply as $day) {
                                                            if (isset($data[$hour-6][$day]) && !empty($data[$hour-6][$day])) {
                                                                $data[$hour-6][$day] = 'active';
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                } else {
                                    //this is a specific date
                                    $date = $rule->rules_value;
                                    if (in_array($date, $week_dates)) {
                                        //this date falls in our selected week, so figure out the weekday
                                        $index = array_search($date, $week_dates);
                                        $day_str = $weekday_names[$index];
                                        //because this rule will override any previously set hours on these days, reset them to inactive before applying the hours
                                        foreach ($data as $hour) {
                                            $hour[$day_str] = 'inactive';
                                        }
                                        $hours_to_apply = hours_rangetoarray($rule->rules_rule);
                                        if (count($hours_to_apply) > 0) {
                                            foreach ($hours_to_apply as $hour) {
                                                if (isset($data[$hour-6][$day_str]) && !empty($data[$hour-6][$day_str])) {
                                                    $data[$hour-6][$day_str] = 'active';
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }

                        //now we have when the trainer is available, so we need to look at their sessions booked in between start_date and end_date and mark these spots as booked in the timetable

                        //TODO: CONSIDER THE TRAINER'S LOCATION AT DIFFERENT TIMES IN THE TIMETABLE
                        return json_encode(['status' => 'success', 'data' => $data]);
                    }
                }
            }
        }
        return json_encode(['status' => 'error']);
    }

    public function timetable_week_dates(Request $request) {
        $user_id = $request->input('user_id');
        $year = $request->input('year');
        $month = $request->input('month');
        $week = $request->input('week');

        if (check_input([$user_id, $year, $month, $week])) {
            //verify that the user is a trainer, verify that the dates given are valid (within 6 months), load the timetable of the trainer and return it in the data object
            $trainer = DB::table('users')
                        ->where([
                            ['users_id', $user_id],
                            ['users_type', 1],
                            ['users_active', 1]
                        ])
                        ->first();            if (!is_null($trainer)) {
                $dates = timetable_get_dates($year, $month, $week);
                if ($dates != false && count($dates) == 2) {
                    $start_date = $dates[0]; //both of these are valid dates in dd/mm/YYYY format
                    $end_date = $dates[1];

                    $week_dates = timetable_get_week_dates($start_date, $end_date); //mon is index 0, tue is index 1, .. , sun is index 6
                    if ($week_dates != false && count($week_dates) == 7) {
                        return json_encode(['status' => 'success', 'week_dates' => $week_dates]);
                    }
                }
            }
        }
        return json_encode(['status' => 'error']);
    }

    public function session_get_details(Request $request) {
        $trainer_id = $request->input('trainer_id');
        $date = $request->input('date');
        $time = $request->input('time');

        if (check_input([$trainer_id, $date, $time])) {
            $trainer = DB::table('users')
                        ->where([
                            ['users_id', $trainer_id],
                            ['users_type', 1],
                            ['users_active', 1]
                        ])
                        ->first();
            if (!is_null($trainer)) {
                if ($request->session()->has('id') && $request->session()->get('id') == $trainer_id) {
                    //the user IS the trainer, so they shouldve never been allowed to get to this point
                    return json_encode(['status' => 'error']);
                }
                //now we want to make sure the trainer is actually working on this date/time, and then get the location and price
                if (timetable_check_slot($trainer_id, $date, $time)) {
                    $day = date_to_weekday($date);
                    $day_conversions = ['mon' => 'Monday', 'tue' => 'Tuesday', 'wed' => 'Wednesday', 'thu' => 'Thursday', 'fri' => 'Friday', 'sat' => 'Saturday', 'sun' => 'Sunday'];
                    $day_long = '';
                    if ($day != '') {
                        $day_long = $day_conversions[$day];
                    }
                    $time_24 = time_12to24hr($time);
                    $location_id = 0;
                    $location = [];
                    $activities = []; //stores the activity info and price for this session for each activity available
                    //locations are stored as: location_id, location_name, location_pictureid, location_address_..., 
                    //timetable_attendance is stored as: attendance_id, attendance_userid, attendance_locationid, attendance_type, attendance_day, attendance_hours
                        //attendance_type 0 (global attendance): 1, 21, 34, 0, 'mon', '9-16,18-20' ('6-21' means all)
                        //attendance_type 1: (date attendance): 2, 21, 89, 1, '14/10/18', '10-18' (completely overrides global rule)
                        //NOTE: LOCATION_ID OF 0 MEANS AT THE TRAINER'S ACCOUNT'S ADDRESS
                    $specific_attendances = DB::table('timetable_attendance')
                                            ->where([
                                                ['attendance_userid', $trainer_id],
                                                ['attendance_type', 1],
                                                ['attendance_day', $date]
                                            ])
                                            ->get();
                    if (!is_null($specific_attendances) && count($specific_attendances) > 0) {
                        //look at these only, because they overrides any type 0 attendances for this day
                        foreach ($specific_attendances as $attendance) {
                            $hours = hours_rangetoarray($attendance->attendance_hours);
                            if (in_array($time_24, $hours)) {
                                $location_id = $attendance->attendance_locationid;
                                break;
                            }
                        }
                    } else {
                        $general_attendances = DB::table('timetable_attendance')
                                                ->where([
                                                    ['attendance_userid', $trainer_id],
                                                    ['attendance_type', 0],
                                                    ['attendance_day', $day]
                                                ])
                                                ->get();
                        if (!is_null($general_attendances) && count($general_attendances) > 0) {
                            //one of these should tell us where the trainer is working at our day/time
                            foreach ($general_attendances as $attendance) {
                                $hours = hours_rangetoarray($attendance->attendance_hours);
                                if (in_array($time_24, $hours)) {
                                    $location_id = $attendance->attendance_locationid;
                                    break;
                                }
                            }
                        }
                    }

                    if ($location_id == 0) {
                        $location = [0, $trainer->users_fname."'s Home", asset('/images/default_profile.png'), $trainer->users_address_number.' '.$trainer->users_address_streetname.' '.$trainer->users_address_suburb.' ('.$trainer->users_address_state.')']; //TODO: MAKE DEFAULT LOCATION PICTURE AND REPLACE HERE AND IN HELPER
                    } else {
                        $location_obj = DB::table('locations')
                                            ->where([
                                                ['locations_id', $location_id],
                                                ['locations_active', 1]
                                            ])
                                            ->first();
                        if (!is_null($location_obj)) {
                            $location = [$location_id, $location_obj->locations_name, location_get_pictureurl($location_id), $location_obj->locations_address_number.' '.$location_obj->locations_address_streetname.' '.$location_obj->locations_address_suburb.' ('.$location_obj->locations_address_state.')'];
                        }
                    }

                    //now get the cost of this session for each possible activity type (default is the trainer's base cost for the type)
                    //TODO: CONSIDER IF A TRAINING LOCATION RESTRICTS THE TYPE OF ACTIVITY THE TRAINER CAN PROVIDE (e.g, gym vs park) (MAYBE VIA A NEW TABLE THAT SAVES TRAINERS REGISTERING TO A LOCATION AND SELECTING THE ACTIVITIES THEY CAN PERFORM THERE, THIS CAN ACT AS THE MAIN ACTIVITIES_TRAINERS TABLE)
                    $activities = [[12, 'Cardio', 65], [5, 'Weights', 60]]; //TEMPORARY

                    return json_encode(['status' => 'success', 'day' => $day_long, 'date' => $date, 'location' => $location, 'activities' => $activities]);
                }
            }
        }
        return json_encode(['status' => 'error']);
    }

    public function testcode(Request $request) {}
}
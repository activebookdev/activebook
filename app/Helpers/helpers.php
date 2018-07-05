<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use mofodojodino\ProfanityFilter\Check;

if (!function_exists('user_get_age')) {
    function user_get_age($dob) {
        //return the age in years of a user, given their dob in dd/mm/YYYY format, or false if the format of dob is wrong
        $age = '';
        if (strlen($dob) == 10) {
            $dob_day = substr($dob, 0, 2);
            if ($dob_day[0] == '0') {
                $dob_day = (int)$dob_day[1];
            } else {
                $dob_day = (int)$dob_day;
            }
            $dob_month = substr($dob, 3, 2);
            if ($dob_month[0] == '0') {
                $dob_month = (int)$dob_month[1];
            } else {
                $dob_month = (int)$dob_month;
            }
            $dob_year = (int)substr($dob, 6, 4);

            $current = date('d/m/Y');
            $current_day = substr($current, 0, 2);
            if ($current_day[0] == '0') {
                $current_day = (int)$current_day[1];
            } else {
                $current_day = (int)$current_day;
            }
            $current_month = substr($current, 3, 2);
            if ($current_month[0] == '0') {
                $current_month = (int)$current_month[1];
            } else {
                $current_month = (int)$current_month;
            }
            $current_year = (int)substr($current, 6, 4);

            $year_diff = $current_year - $dob_year;
            $month_diff = $current_month - $dob_month;
            $day_diff = $current_day - $dob_day;

            $age = $year_diff + (1/12)*$month_diff + (1/365)*$day_diff;
            $age = (int)floor($age);
        }
        return $age;
    }
}

if (!function_exists('user_get_pictureid')) {
    function user_get_pictureurl($user_id) {
        //return the picture_name of the user's current profile picture, or the default if none exists
        $picture_url = asset('/images/default_profile.png');
        $user = DB::table('users AS u')
                    ->join('user_pictures AS p', function($join) {
                        $join->on('p.pictures_userid', '=', 'u.users_id')
                            ->where('p.pictures_active', 1);
                    })
                    ->where([
                        ['u.users_id', $user_id],
                        ['u.users_active', 1]
                    ])
                    ->first();
        if (!is_null($user)) {
            $picture_url = Storage::url('picture_'.(string)$user->pictures_id.'.'.$user->pictures_filetype);
        }
        return $picture_url;
    }
}

if (!function_exists('user_get_membertime')) {
    function user_get_membertime($user_id) {
        //return a string of the time that this user has been a member for (x days or x weeks or x months or x years, always rounded down (except < 1 day))
        $member_time = '1 day';
        $user = DB::table('users')
                    ->where([
                        ['users_id', $user_id],
                        ['users_active', 1]
                    ])
                    ->first();
        if (!is_null($user)) {
            $created_at = $user->users_createdat;
            $member_inttime = time() - $created_at;
            if ($member_inttime < 0) {
                $member_inttime = 0;
            }
            $num_days = (int)floor($member_inttime/(60*60*24));
            if ((int)floor($num_days/365) >= 1) {
                //express member_time in years
                $num_years = (int)floor($num_days/365);
                if ($num_years == 1) {
                    $member_time = '1 year';
                } else {
                    $member_time = (string)$num_years.' years';
                }
            } else if ((int)floor($num_days/30) >= 1) {
                //express member_time in months
                $num_months = (int)floor($num_days/30);
                if ($num_months == 1) {
                    $member_time = '1 month';
                } else {
                    $member_time = (string)$num_months.' months';
                }
            } else if ((int)floor($num_days/7) >= 1) {
                //express member_time in weeks
                $num_weeks = (int)floor($num_days/7);
                if ($num_weeks == 1) {
                    $member_time = '1 week';
                } else {
                    $member_time = (string)$num_weeks.' weeks';
                }
            } else {
                //express member time in days
                if ($num_days == 1) {
                    $member_time = '1 day';
                } else {
                    $member_time = (string)$num_days.' days';
                }
            }

        }
        return $member_time;
    }
}

if (!function_exists('user_get_recenttrainers')) {
    function user_get_recenttrainers($user_id) {
        //return an array of the last 3 trainers this user used (id, name, picture and primary sport), or an empty array otherwise
        $trainers = [['id' => 0, 'name' => '', 'picture' => asset('/images/default_profile.png'), 'primary_sport' => ['name' => '', 'icon' => '']], ['id' => 0, 'name' => '', 'picture' => asset('/images/default_profile.png'), 'primary_sport' => ['name' => '', 'icon' => '']],['id' => 0, 'name' => '', 'picture' => asset('/images/default_profile.png'), 'primary_sport' => ['name' => '', 'icon' => '']]];
        //...
        return $trainers;
    }
}

if (!function_exists('user_get_stats')) {
    function user_get_stats($user_id) {
        //return an array of the 3 key stats of the user (total number of completed sessions, favourite sport, favourite trainer), or an empty array otherwise
        $stats = ['num_sessions' => 0, 'fav_sport' => ['name' => '', 'icon' => ''], 'fav_trainer' => ['id' => 0, 'name' => '', 'picture' => asset('/images/default_profile.png'), 'primary_sport' => ['name' => '', 'icon' => '']]];
        //TEMPORARY
        $stats = ['num_sessions' => 37, 'fav_sport' => ['name' => 'Weights', 'icon' => 'fas fa-dumbbell'], 'fav_trainer' => ['id' => 19, 'name' => 'Blake Garrett', 'picture' => asset('/images/default_profile.png'), 'primary_sport' => ['name' => 'Cardio', 'icon' => '']]];
        return $stats;
    }
}

if (!function_exists('filter_text_profanity')) {
    function filter_text_profanity($text) {
        //return true if the text contains profanity, return false otherwise
        $check = new Check();
        $result = $check->hasProfanity($text);
        return $result;
    }
}

if (!function_exists('check_input')) {
    function check_input($input_arr) {
        if (isset($input_arr) && count($input_arr) > 0) {
            foreach ($input_arr as $input) {
                if (!isset($input) || empty($input) || is_null($input)) {
                    return false;
                }
            }
        }
        return true;
    }
}

if (!function_exists('generate_token')) {
    function generate_token($length) {
        if (is_int((int)$length)) {
            $length = (int)$length;
        } else {
            $length = 50; //the default token length
        }
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters_length = strlen($characters);
        $token = '';
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[rand(0, $characters_length - 1)];
        }
        return $token;
    }
}
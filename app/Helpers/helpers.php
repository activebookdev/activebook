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

if (!function_exists('trainer_get_baserate')) {
    function trainer_get_baserate($user_id) {
        $baserate = 0;
        //TODO: LOOK AT TRAINER PRICING TABLE TO GET THEIR BASERATE
        $baserate = 50; //TEMPORARY
        return '$'.(string)$baserate.'/hr';
    }
}

if (!function_exists('trainer_get_stats')) {
    function trainer_get_stats($user_id) {
        $stats = ['sessions_total' => 0, 'sessions_week' => 0, 'sessions_month' => 0, 'rating' => 0];
        //TODO: GET APPROPRIATE STATS FOR A TRAINER AND PACK THEM INTO THIS ARRAY (INCLUDES MAKING A RATINGS TABLE WITH trainer_id, customer_id, rating(/10), time)
        $stats = ['sessions_total' => 1591, 'sessions_week' => 14, 'sessions_month' => 57, 'rating' => '72%']; //TEMPORARY
        return $stats;
    }
}

if (!function_exists('trainer_get_locations')) {
    function trainer_get_locations($user_id) {
        $locations = [['id' => 0, 'name' => '', 'picture_url' => '']];
        //TODO: MAKE A LOCATIONS TABLE TO STORE LOCATIONS NAME, PICTURE NAME AND ADDRESS AND THEN MAKE A TRAINER_LOCATIONS TABLE TO LINK TRAINERS TO THEM
        //THEN USE THESE TABLES TO FILL OUT THIS ARRAY
        //TODO: MAKE A LOCATIONS PAGE THAT LISTS BASIC LOCATION INFO AS ABOVE, AND LISTS IN ORDER OF RATING THE TRAINERS THAT WORK THERE
        $locations[0] = ['id' => 0, 'name' => 'ChadGym', 'picture_url' => asset('/images/default_profile.png')]; //TEMPORARY
        return $locations;
    }
}

if (!function_exists('socials_typetoname')) {
    function socials_typetoname($type) {
        $conversion = ['fab fa-facebook-f', 'fab fa-twitter', 'fab fa-instagram', 'fab fa-snapchat-ghost', 'fab fa-linkedin-in', 'fab fa-google-plus-g', 'fab fa-youtube', 'fab fa-tumblr', 'fab fa-whatsapp', 'fab fa-pinterest-p', 'fab fa-reddit-alien'];
        if (!is_null($type) && is_int($type) && $type >= 0 && $type <= 10) {
            return $conversion[$type];
        }
        return 'fas fa-user';
    }
}

if (!function_exists('trainer_get_socials')) {
    function trainer_get_socials($user_id) {
        $socials_arr = [];
        if (!empty($user_id) && !is_null($user_id)) {
            $socials = DB::table('user_socials')
                    ->where('socials_userid', $user_id)
                    ->get();
            if (!is_null($socials) && count($socials) > 0) {
                foreach ($socials as $s) {
                    $socials_arr[] = ['type' => $s->socials_type, 'name' => socials_typetoname($s->socials_type), 'url' => $s->socials_url];
                }
            }
        }
        return $socials_arr;
    }
}

if (!function_exists('trainer_update_social')) {
    function trainer_update_social($user_id, $type, $url) {
        if (isset($user_id) && !empty($user_id) && isset($type) && is_int($type) && $type >= 0 && $type <= 10) {
            $social = DB::table('user_socials')
                        ->where([
                            ['socials_userid', $user_id],
                            ['socials_type', $type]
                        ])
                        ->first();
            if (!is_null($social)) {
                DB::table('user_socials')
                    ->where('socials_id', $social->socials_id)
                    ->update(['socials_url' => $url]);
            } else if ($url != '') {
                DB::table('user_socials')
                    ->insert(['socials_userid' => $user_id, 'socials_type' => $type, 'socials_url' => $url]);
            }
        }
    }
}

if (!function_exists('trainer_get_reviews')) {
    function trainer_get_reviews($user_id) {
        $reviews = [];
        //TODO: MAKE A REVIEWS TABLE THAT STORES reviewer_id, trainer_id, review_rating, review_desc, review_time (look into restricting review character count, at least for showing the first 2 reviews)
        $reviews = [['reviewer_id' => 17, 'reviewer_picture_url' => 'https://s3-ap-southeast-2.amazonaws.com/activebook-bucket/pictures/picture_18.jpg', 'review' => 'Chad was a great trainer, he helped me gain confidence whilst also being harsh enough to push me towards my goals'], ['reviewer_id' => 20, 'reviewer_picture_url' => 'https://s3-ap-southeast-2.amazonaws.com/activebook-bucket/pictures/picture_19.jpg', 'review' => "Chad was a terrible trainer, he wasn't nice to me and pushed me way too hard for someone who is just starting out."]]; //TEMPORARY
        return $reviews;
    }
}

if (!function_exists('trainer_get_activities')) {
    function trainer_get_activities($user_id) {
        $activities = [];
        //TODO: MAKE A TABLE CALLED ACTIVITIES TO STORE ALL OF ACTIVEBOOKS ACTIVITIES, THEN A TRAINER_ACTIVITIES TO STORE A TRAINER'S ACTIVITIES THAT THEY OFFER, THEN LOOK THROUGH THE SESSIONS DATA OF THE TRAINER TO CALCULATE THE PERCENTAGE OF EACH ACTIVITY OUT OF THEIR SESSIONS IN THE LAST 12 MONTHS
        $activities = [['name' => 'Weights', 'percentage' => 43, 'bgcolour' => 'rgba(255, 99, 132, 0.2)', 'bdcolour' => 'rgba(255,99,132,1)'], ['name' => 'Fitness', 'percentage' => 29, 'bgcolour' => 'rgba(54, 162, 235, 0.2)', 'bdcolour' => 'rgba(54, 162, 235, 1)'], ['name' => 'Cardio', 'percentage' => 28, 'bgcolour' => 'rgba(255, 206, 86, 0.2)', 'bdcolour' => 'rgba(255, 206, 86, 1)']]; //TEMPORARY
        return $activities;
    }
}

if (!function_exists('timetable_get_years')) {
    function timetable_get_years() {
        $years = [];
        $current_year = date('Y');
        $current_month = date('n');
        if ($current_month <= 7) {
            $years = [$current_year];
        } else {
            $years = [$current_year, (int)($current_year)+1];
        }
        return $years;
    }
}

if (!function_exists('timetable_get_dates')) {
    function timetable_get_dates($year, $month, $week) {
        if (!is_null($year) && !is_null($month) && !is_null($week)) {
            //verify these are valid dates and then convert them into an array of start date and end date in dd/mm/YYYY format
            $current_year = date('Y');
            $current_month = date('n');
            if (($current_month <= 7 && $current_year == (int)$year) || ($current_month >= 8 && ($current_year == (int)$year || (int)$current_year+1 == (int)$year))) {
                //the year is a valid one
                if (((int)$year == $current_year && (int)$month >= $current_month && (int)$month - $current_month < 6) || ((int)$year == (int)$current_year+1 && (int)$month < $current_month && (int)$month+12 - $current_month < 6)) {
                    //the month is a valid one
                    $day_nums = explode('-', $week);
                    if (count($day_nums) == 2 && is_int((int)$day_nums[0]) && is_int((int)$day_nums[1])) {
                        $start_day = (int)$day_nums[0];
                        $start_date = $year.'/'.$month.'/'.$start_day;
                        $day_count = (int)cal_days_in_month(CAL_GREGORIAN, $month, $year); //the number of days in the month
                        $end_day = (int)$day_nums[1];
                        if ($end_day > $start_day) {
                            $end_date = $year.'/'.$month.'/'.$end_day; //end day is in the same month as start day
                        } else {
                            $end_date = $year.'/'.((int)$month+1).'/'.$end_day; //end day is in the next month
                            if ($month == 12) {
                                $end_date = ((int)$year+1).'/1/'.$end_day; //end day is in the next month, which is in the next year
                            }
                        }

                        //get the 'names' of the start and end dates
                        $get_start_name = date('l', strtotime($start_date));
                        $start_day_name = substr($get_start_name, 0, 3);
                        $get_end_name = date('l', strtotime($end_date));
                        $end_day_name = substr($get_end_name, 0, 3);
                        if ($start_day_name == 'Mon' && $end_day_name == 'Sun') {
                            //make sure these span one week only
                            if (($start_day < $end_day && $end_day - $start_day == 6) || ($start_day > $end_day && ($end_day+$day_count) - $start_day == 6)) {
                                //everything is valid, so we now need to format the two dates into full dd/mm/YYYY format
                                $start_day_str = (string)$start_day;
                                if ($start_day <= 9) {
                                    $start_day_str = '0'.(string)$start_day;
                                }
                                $end_day_str = (string)$end_day;
                                if ($end_day <= 9) {
                                    $end_day_str = '0'.(string)$end_day;
                                }
                                $start_month = $month;
                                $end_month = $month;
                                if ($end_day < $start_day) {
                                    $end_month = (int)$month+1;
                                    if ($end_month == 13) {
                                        $end_month = 1;
                                    }
                                }
                                $start_month_str = (string)$start_month;
                                if ($start_month <= 9) {
                                    $start_month_str = '0'.(string)$start_month;
                                }
                                $end_month_str = (string)$end_month;
                                if ($end_month <= 9) {
                                    $end_month_str = '0'.(string)$end_month;
                                }
                                $start_year = $year;
                                $end_year = $year;
                                if ($end_day < $start_day && $month == 12) {
                                    $end_year = (int)$year+1;
                                }
                                $start_year_str = (string)$start_year;
                                $end_year_str = (string)$end_year;

                                return [$start_day_str.'/'.$start_month_str.'/'.$start_year_str, $end_day_str.'/'.$end_month_str.'/'.$end_year_str];
                            }
                        }
                    }
                }
            }
        }
        return false;
    }
}

if (!function_exists('timetable_get_week_dates')) {
    function timetable_get_week_dates($start_date, $end_date) {
        if (isset($start_date) && !is_null($start_date) && strlen($start_date) == 10 && isset($end_date) && !is_null($end_date) && strlen($end_date) == 10) {
            $start_arr = explode('/', $start_date);
            $end_arr = explode('/', $end_date);
            if (count($start_arr) == 3 && count($end_arr) == 3) {
                $start_day = $start_arr[0];
                $end_day = $end_arr[0];
                if ($start_day[0] == '0') {
                    $start_day = $start_day[1];
                }
                if ($end_day[0] == '0') {
                    $end_day = $end_day[1];
                }
                $start_day = (int)$start_day;
                $end_day = (int)$end_day;
                $week = [];
                $month = $start_arr[1];
                $year = $start_arr[2];
                if ($end_day - $start_day == 6) {
                    for ($i = $start_day; $i <= $end_day; $i++) {
                        if ($i >= 10) {
                            $day = (string)$i;
                        } else {
                            $day = '0'.(string)$i;
                        }
                        $week[] = $day.'/'.$month.'/'.$year;
                    }
                } else {
                    //these days are in different months and could even be in different years
                    if ($month[0] == '0') {
                        $int_month = (int)$month[1];
                    } else {
                        $int_month = (int)$month;
                    }
                    $day_count = (int)cal_days_in_month(CAL_GREGORIAN, $int_month, $year);
                    for ($i = $start_day; $i <= $end_day+$day_count; $i++) {
                        $day = $i;
                        if ($day > $day_count) {
                            //this day is in the month after
                            $day -= $day_count;
                            if ($i >= 10) {
                                $day = (string)$day;
                            } else {
                                $day = '0'.(string)$day;
                            }
                            if ($int_month+1 == 13) {
                                //this day is in the next year too
                                $week[] = $day.'/'.(string)($int_month+1).'/'.(string)((int)$year+1);
                            } else {
                                //same year
                                $week[] = $day.'/'.(string)($int_month+1).'/'.$year;
                            }
                        } else {
                            if ($i >= 10) {
                                $day = (string)$i;
                            } else {
                                $day = '0'.(string)$i;
                            }
                            $week[] = $day.'/'.$month.'/'.$year;
                        }
                    }
                }
                return $week;
            }
        }
        return false;
    }
}

if (!function_exists('daterange_get_dates')) {
    function daterange_get_dates($start_date, $end_date) {
        if (isset($start_date) && !is_null($start_date) && strlen($start_date) == 10 && isset($end_date) && !is_null($end_date) && strlen($end_date) == 10) {
            $start_arr = explode('/', $start_date);
            $end_arr = explode('/', $end_date);
            if (count($start_arr) == 3 && count($end_arr) == 3) {
                $period = new DatePeriod(
                    new DateTime($start_arr[2].'-'.$start_arr[1].'-'.$start_arr[0]),
                    new DateInterval('P1D'),
                    new DateTime($end_arr[2].'-'.$end_arr[1].'-'.$end_arr[0])
                );
                if (!empty($period)) {
                    $date_array = iterator_to_array($period);
                    $dates = [];
                    if (count($date_array) > 0) {
                        foreach ($date_array as $d) {
                            $date = explode('-', $d);
                            $dates[] = $date[2].'/'.$date[1].'/'.$date[0];
                        }
                        return $dates;
                    }
                }
            }
        }
        return false;
    }
}

if (!function_exists('time_12to24hr')) {
    function time_12to24hr($time) {
        $time_24 = 0;
        if (isset($time) && !empty($time)) {
            if (strpos($time, 'a') != false) {
                $split = explode('a', $time);
                $time_24 = (int)$split[0];
            } else if (strpos($time, 'p') != false) {
                $split = explode('p', $time);
                $time_24 = (int)$split[0];
                if ($time_24 != 12) {
                    $time_24 += 12;
                }
            }
        }
        return $time_24;
    }
}

if (!function_exists('date_to_weekday')) {
    function date_to_weekday($date) {
        $weekday = '';
        if (isset($date) && !empty($date)) {
            $type = CAL_GREGORIAN;
            $date_arr = explode('/', $date);
            if (count($date_arr) == 3) {
                $format_date = $date_arr[2].'/'.$date_arr[1].'/'.$date_arr[0];
                $get_name = date('l', strtotime($format_date));
                $weekday = substr($get_name, 0, 3); // trim day name to 3 chars
                if (!in_array($weekday, ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sub'])) {
                    $weekday = '';
                } else {
                    $weekday = strtolower($weekday);
                }
            }
        }
        return $weekday;
    }
}

if (!function_exists('hours_rangetoarray')) {
    function hours_rangetoarray($range) {
        $hours_array = [];
        if (isset($range) && !empty($range)) {
            $hours_arr = explode(',', $range);
            if (count($hours_arr) > 0) {
                foreach ($hours_arr as $hours) {
                    //this could either be a single hour or a span (-) in 24hr format
                    $hour_arr = explode('-', $hours);
                    if (count($hour_arr) == 1) {
                        $hours_array[] = (int)$hour_arr[0];
                    } else if (count($hour_arr) == 2) {
                        for ($i = (int)$hour_arr[0]; $i <= (int)$hour_arr[1]; $i++) {
                            $hours_array[] = (int)$i;
                        }
                    }
                }
            }
        }
        return $hours_array;
    }
}

if (!function_exists('ab_in_array')) {
    function ab_in_array($needle, $haystack) {
        foreach ($haystack as $h) {
            if ($needle == $h) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('timetable_check_slot')) {
    function timetable_check_slot($trainer_id, $date, $time) {
        //check that the trainer exists and that they are working at the given day and time
        if (isset($trainer_id) && !empty($trainer_id) && isset($date) && !empty($date) && isset($time) && !empty($time)) {
            //put the time into 24hr time
            $time = (int)time_12to24hr($time);
            $date_day = date_to_weekday($date);
            $trainer = DB::table('users')
                        ->where([
                            ['users_id', $trainer_id],
                            ['users_type', 1],
                            ['users_active', 1]
                        ])
                        ->first();
            if (!is_null($trainer)) {
                $specific_rule = DB::table('timetable_rules')
                                    ->where([
                                        ['rules_userid', $trainer_id],
                                        ['rules_type', 2],
                                        ['rules_value', $date],
                                        ['rules_active', 1]
                                    ])
                                    ->first();
                if (!is_null($specific_rule)) {
                    //this will override any type 0 or 1 rules, so look at this only
                    $hours = hours_rangetoarray($specific_rule->rules_rule);
                    return (array_search($time, $hours) >= 0);
                }

                $range_rules = DB::table('timetable_rules')
                                ->where([
                                    ['rules_userid', $trainer_id],
                                    ['rules_type', 1],
                                    ['rules_active', 1]
                                ])
                                ->get();
                if (!is_null($range_rules) && count($range_rules) > 0) {
                    //these will override any type 0 rules, so look through these (there may be none that apply to our specific date - if so, look down to type 0)
                    foreach ($range_rules as $rule) {
                        $value = explode(':', $rule->rules_value);
                        if (count($value) == 2) {
                            $days_arr = explode(',', $value[0]);
                            if (count($days_arr) > 0 && in_array($date_day, $days_arr)) {
                                //the weekday we're looking at is in this rule
                                $date_range = explode('-', $value[1]);
                                if ($date_range[0] < $date && $date_range[1] > $date) {
                                    //our date is in the range also, so this rule applies
                                    $hours = hours_rangetoarray($rule->rules_rule);
                                    return (array_search($time, $hours) >= 0);
                                }
                            }
                        }
                    }
                }

                $global_rules = DB::table('timetable_rules')
                                ->where([
                                    ['rules_userid', $trainer_id],
                                    ['rules_type', 0],
                                    ['rules_active', 1]
                                ])
                                ->get();
                if (!is_null($global_rules) && count($global_rules) > 0) {
                    foreach ($global_rules as $rule) {
                        $days_arr = explode(',', $rule->rules_value);
                        if (count($days_arr) > 0 && in_array($date_day, $days_arr)) {
                            //this global rule applies to our day
                            $hours = hours_rangetoarray($rule->rules_rule);
                            return true; //TEMPORARY (TODO: FIX THIS SHIT)
                            //return in_array($time, $hours); TODO: FIGURE OUT THE PROBLEM WITH RETURNING THE IN_ARRAY FUNCTION (BROKEN AF)
                        }
                    }
                }
            }
        }
        return false;
    }
}

if (!function_exists('date_add_days')) {
    function date_add_days($date, $num_days) {
        if (isset($date) && !empty($date) && strlen($date) == 10 && count(explode('/', $date)) == 3 && isset($num_days) && is_int($num_days)) {
            $date_arr = explode('/', $date);
            $day = $date_arr[0];
            if ($day[0] == '0') {
                $day = $day[1];
            }
            $day = (int)$day;
            $month = $date_arr[1];
            if ($month[0] == '0') {
                $month = $month[1];
            }
            $month = (int)$month;
            $year = (int)$date_arr[2];
            
            //now add num_days days to the date, also incrementing the month and year when needed
            $days_added = 0;
            $day_count = (int)cal_days_in_month(CAL_GREGORIAN, $month, $year);
            while ($days_added < $num_days) {
                $day++;
                $days_added++;
                if ($day > $day_count) {
                    //we need to shift month and possibly year
                    $day = 1;
                    $month++;
                    if ($month > 12) {
                        $month = 1;
                        $year++;
                    }
                    $day_count = (int)cal_days_in_month(CAL_GREGORIAN, $month, $year);
                }
            }

            //format our date before returning
            if ($day <= 9) {
                $day = '0'.(string)$day;
            } else {
                $day = (string)$day;
            }
            if ($month <= 9) {
                $month = '0'.(string)$month;
            } else {
                $month = (string)$month;
            }
            $year = (string)$year;
            return $day.'/'.$month.'/'.$year;
        }
        return false;
    }
}

if (!function_exists('timetable_get_recurring')) {
    function timetable_get_recurring($trainer_id, $date, $time) {
        //this function assumes that the trainer exists and that they are working at the given day and time
        if (isset($trainer_id) && !empty($trainer_id) && isset($date) && !empty($date) && isset($time) && !empty($time)) {
            //put the time into 24hr time
            $time = (int)time_12to24hr($time);
            $date_day = date_to_weekday($date);
            
            //fill an array with the max possible recurring sessions for this date
            $recurring = [];
            for ($i = 0; $i < 8; $i++) {
                $new_date = date_add_days($date, 7*$i);
                if ($new_date != false) {
                    $recurring[] = $new_date;
                }
            }

            //restrict these dates to all be within 6 months from this month
            $year = (string)date('Y');
            $month = (int)date('n');
            $allowable_monthsyears = [];
            for ($i = 0; $i < 6; $i++) {
                if ($month > 12) {
                    //we need to move onto the next year
                    $year = (int)$year;
                    $year++;
                    $year = (string)$year;
                    $month = 1;
                }
                if ($month <= 9) {
                    $str_month = '0'.(string)$month;
                } else {
                    $str_month = (string)$month;
                }
                $allowable_monthsyears[] = $str_month.'/'.$year;
                $month++;
            }

            $recurring_restricted = [];
            foreach ($recurring as $r) {
                $month_year = substr($r, 3, 9);
                if (in_array($month_year, $allowable_monthsyears)) {
                    $recurring_restricted[] = $r;
                } else {
                    break; //once one of the dates goes over, we know the rest will 
                }
            }
            $recurring = $recurring_restricted;

            //restrict these dates to only those where the trainer is available
            $recurring_restricted = [];
            foreach ($recurring as $r) {
                if (timetable_check_slot($trainer_id, $r, $time)) {
                    $recurring_restricted[] = $r;
                } else {
                    break; //once one date is unavailable, we can't look onwards after it
                }
            }
            $recurring = $recurring_restricted;
            return $recurring;
        }
        return false;
    }
}

if (!function_exists('small_integer_to_word')) {
    function small_integer_to_word($number, $capitalise) {
        $word = '';
        if (!is_null($number) && is_int($number) && $number >= 0 && $number <= 10 && !is_null($capitalise) && is_bool($capitalise)) {
            if ($capitalise == true) {
                $conversion = ['Zero', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten'];
            } else {
                $conversion = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten'];
            }
            $word = $conversion[$number];
        }
        return $word;
    }
}

if (!function_exists('recurring_dates_options')) {
    function recurring_dates_options($trainer_id, $recurring_dates, $time) {
        $recurring_options = [];
        //this function assumes the trainer exists, and is working at the given dates and times (e.g: [03/04/18, 10/04/18, 17/04/18, 24/04/18], 10am)
        //turn this information into an array of information ([[1, 'Single' '0'], [2, 'Two Weeks', '+5'], [3, 'Three Weeks', '+5'], [4, 'Four Weeks', '-10']]) (if 2 has +5 and the third session has +0, then 3 has +5)
        if (!is_null($trainer_id) && is_int($trainer_id) && !is_null($recurring_dates) && is_array($recurring_dates) && !is_null($time)) {
            if (count($recurring_dates) > 0) {
                $date_day = date_to_weekday($recurring_dates[0]); //every date falls on the same weekday
                //temporarily store the recurring numbers and a modifier of 0, which will be worked on below
                foreach ($recurring_dates as $num => $date) {
                    $desc = 'Single';
                    if ($num+1 > 1) {
                        $desc = small_integer_to_word($num+1, true).' Weeks';
                    }
                    $recurring_options[] = [$num+1, $desc, 0]; //to get the date for any option, do recurring_dates[option[0]-1]
                }

                //find and apply the payment modifiers to the recurring dates
                $payment_modifiers = DB::table('payment_modifiers')
                                        ->where([
                                            ['modifiers_userid', $trainer_id],
                                            ['modifiers_type', '!=', 0] //these are baserates that are not needed here
                                        ])
                                        ->orderBy('modifiers_type', 'asc')
                                        ->get();
                if (!is_null($payment_modifiers) && count($payment_modifiers) > 0) {
                    foreach ($payment_modifiers as $modifier) {
                        if ($modifier->modifiers_type == 1 && $modifier->modifiers_value == $time) {
                            //apply this rule to every option
                            $amount = 0;
                            if ($modifier->modifiers_rule[0] == '+') {
                                $amount = (int)substr($modifier->modifiers_rule[0], 1);
                            } else if ($modifier->modifiers_rule[0] == '-') {
                                $amount = (-1)*(int)substr($modifier->modifiers_rule[0], 1);
                            }
                            foreach ($recurring_options as $option) {
                                $option[2] += $amount;
                            }
                        } else if ($modifier->modifiers_type == 2 && $modifier->modifiers_value == $date_day) {
                            //apply this rule to every option
                            $amount = 0;
                            if ($modifier->modifiers_rule[0] == '+') {
                                $amount = (int)substr($modifier->modifiers_rule[0], 1);
                            } else if ($modifier->modifiers_rule[0] == '-') {
                                $amount = (-1)*(int)substr($modifier->modifiers_rule[0], 1);
                            }
                            foreach ($recurring_options as $option) {
                                $option[2] += $amount;
                            }
                        } else if ($modifier->modifiers_type == 3 && in_array($modifier->modifiers_value, $recurring_dates)) {
                            //apply this rule to every option >= given date
                            $start_index = array_search($modifier->modifiers_value, $recurring_dates);
                            $amount = 0;
                            if ($modifier->modifiers_rule[0] == '+') {
                                $amount = (int)substr($modifier->modifiers_rule[0], 1);
                            } else if ($modifier->modifiers_rule[0] == '-') {
                                $amount = (-1)*(int)substr($modifier->modifiers_rule[0], 1);
                            }
                            foreach ($recurring_options as $index => $option) {
                                if ($index >= $start_index) {
                                    $option[2] += $amount;
                                }
                            }
                        }
                    }
                }

                //convert the recurring options info into the correct format
                foreach ($recurring_options as $option) {
                    if ($option[2] == 0) {
                        $option[2] = (string)$option[2];
                    } else if ($option[2] > 0) {
                        $option[2] = '+'.(string)$option[2];
                    } else {
                        $option[2] = '-'.(string)$option[2];
                    }
                }
            }
        }
        return $recurring_options;
    }
}

if (!function_exists('location_get_pictureid')) {
    function location_get_pictureurl($location_id) {
        //return the picture_name of the user's current profile picture, or the default if none exists
        $picture_url = asset('/images/default_location.png');
        $location = DB::table('locations AS l')
                    ->join('user_pictures AS p', function($join) {
                        $join->on('p.pictures_userid', '=', 'l.locations_id')
                            ->where('p.pictures_active', 1);
                    })
                    ->where([
                        ['l.locations_id', $location_id],
                        ['l.locations_active', 1]
                    ])
                    ->first();
        if (!is_null($location)) {
            $picture_url = Storage::url('picture_'.(string)$location->pictures_id.'.'.$location->pictures_filetype);
        }
        return $picture_url;
    }
}
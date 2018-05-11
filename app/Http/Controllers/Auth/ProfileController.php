<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;

class ProfileController extends Controller
{

	public function __construct()
    {
        $this->middleware('loggedin');
    }

    public function profile_edit(Request $request) {
    	//this is a page for customer profiles
        //no need to pass a user_id to edit the profile of, as this can only be performed on one's own profile
        $user_id = $request->session()->get('ip');

        $user = DB::table('users')
        			->where([
        				['users_id', $user_id],
        				['users_type', 0]
        				['users_active', 1]
        			])
        			->first();

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

        //TODO: USE GOOGLE MAPS API PLACE AUTOCOMPLETE ADDRESS FORM

        $dob = '';
        if (isset($user->users_dob) && !is_null($user->users_dob)) {
        	$dob = $user->users_dob;
        }

        $gender = 0;
        if (isset($user->users_gender) && !is_null($user->users_gender)) {
        	$gender = $user->users_gender;
        }

        $bio = '';
        if (isset($user->users_bio) && !is_null($user->users_bio)) {
        	$bio = $user->users_bio;
        }

        $wwcc = '';
        if (isset($user->users_wwcc) && !is_null($user->users_wwcc)) {
        	$wwcc = $user->users_wwcc;
        }

        //TODO: RESEARCH IF WWCC IS NECESSARY, AND ALSO FIND OTHER LICENCE NUMBERS RELEVANT FOR PERSONAL TRAINERS / SPORTS COACHES (POSSIBLY ALLOW THEM TO DEFINE THEIR OWN)



        if (count($user) == 1) {
        	return view('profile_edit', [
				'fname' => $user->users_fname,
				'lname' => $user->users_lname,
				'email' => $user->users_email,
				'address_number' => $address_number,
				'address_streetname' => $address_streetname,
				'address_suburb' => $address_suburb,
				'address_postcode' => $address_postcode;
				'address_state' => $address_state,
				'dob' => $dob,
				'gender' => $gender,
				'bio' => $bio,
				'wwcc' => $wwcc
			]);
        }
        return redirect('/');
    }
}

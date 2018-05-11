<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Closure;

class LoggedIn {

    public function handle($request, Closure $next)
    {

        //check that the user id is set and is a valid one in the DB
        if ($request->session()->has('id')) {
            $user_id = $request->session()->get('id');
            $user = DB::table('users')
                        ->select('users_sessionkey')
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
                    if ($key == $db_key) {
                        //the user is logged in
                        return $next($request);
                    }
                }
            }
        }
        return redirect('/login');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sessions_name',
        'sessions_cost', //xxx.xx
        'sessions_sport', //which sport the session belongs to
        'sessions_status', //request, booked, paid for, taken place, archived, contested ...
        'sessions_time', //hour within the day (0-23)
        'sessions_dayid'
    ];

    protected $table = 'sessions';
    protected $primaryKey = 'sessions_id';
}

//TODO: CONSIDER NOT USING THE ELOQUENT SYSTEM BECAUSE IT WILL LIKELY OVER-COMPLICATE SIMPLE DATABASE TRANSACTIONS
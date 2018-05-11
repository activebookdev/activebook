<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_fname',
        'users_lname',
        'users_email',
        'users_address_number',
        'users_address_streetname',
        'users_address_suburb',
        'users_address_state',
        'users_dob',
        'users_gender',
        'users_type',
        'users_bio',
        'users_wwcc',
        'users_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'users_password',
        'users_sessionkey',
        'remember_token'
    ];

    protected $table = 'users';
    protected $primaryKey = 'users_id';
}

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
// FIXME(SPB): 
// use Illuminate\Foundation\Auth\User as Authenticatable;
USE \TCG\Voyager\Models\User as VoyagerUser;
use Illuminate\Notifications\Notifiable;

class User extends VoyagerUser
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

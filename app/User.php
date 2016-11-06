<?php

namespace App;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
//use Eloquent; 
use Illuminate\Contracts\Auth\Authenticatable;
//use Illuminate\Auth\Authenticatable as AuthenticableTrait;



class User extends  Eloquent implements Authenticatable
{
   // use  EntrustUserTrait;
    use AuthenticableTrait, CanResetPassword,EntrustUserTrait;
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
}


<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    //

     protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'firstname','name', 'email', 'password','middlename','lastname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }   
}

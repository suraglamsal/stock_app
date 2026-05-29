<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class RoleUser extends Authenticatable
{
    protected $table = 'role_user';

    protected $fillable = [
        'uname',
        'uaddress',   
        'uage',       
        'uphone',     
        'gender',     
        'ueducation', 
        'email',
        'password',
        'img',        
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
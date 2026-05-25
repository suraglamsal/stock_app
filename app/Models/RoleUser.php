<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticables;

class RoleUser extends Authenticables
{
    protected $table= 'role_user';

    protected $fillable =[
        'uname',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}

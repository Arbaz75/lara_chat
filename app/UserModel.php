<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'login';

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

}

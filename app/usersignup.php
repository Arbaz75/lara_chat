<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usersignup extends Model
{
    protected $table = 'login';
    protected $fillable = ['name','email','password'];
}

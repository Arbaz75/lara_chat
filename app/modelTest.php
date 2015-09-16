<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class modelTest extends Model
{
	use SoftDeletes;
    protected $table = 'test';
    protected $fillable = ['name'];
    protected $dates = ['deleted_at'];
}

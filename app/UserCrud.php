<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCrud extends Model
{
    protected $fillable = ['name','email'];
}

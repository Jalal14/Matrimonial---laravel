<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordToken extends Model
{
    protected $table = 'tbl_password_token';
    public $timestamps = false;
}

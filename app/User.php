<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $table = 'tbl_users';
    protected $primaryKey = 'uid';
    public $timestamps = false;
}

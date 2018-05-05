<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrationRequest extends Model
{
    protected $table = 'tbl_registration_req';
    protected $primaryKey = 'uid';
    public $timestamps = false;
}

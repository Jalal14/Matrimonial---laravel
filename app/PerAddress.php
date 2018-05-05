<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerAddress extends Model
{
    protected $table = 'tbl_per_address';
    protected $primaryKey = 'per_uid';
    public $timestamps = false;
}

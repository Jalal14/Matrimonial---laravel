<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $table = 'tbl_family';
    protected $primaryKey = 'uid';
    public $timestamps = false;
}

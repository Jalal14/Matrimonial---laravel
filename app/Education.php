<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'tbl_education';
    protected $primaryKey = 'uid';
    public $timestamps = false;
}

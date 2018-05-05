<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'tbl_job';
    protected $primaryKey = 'uid';
    public $timestamps = false;
}

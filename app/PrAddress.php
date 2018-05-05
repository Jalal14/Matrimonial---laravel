<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrAddress extends Model
{
    protected $table = 'tbl_pr_address';
    protected $primaryKey = 'pr_uid';
    public $timestamps = false;
}

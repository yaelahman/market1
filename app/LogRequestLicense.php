<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogRequestLicense extends Model
{
    protected $table = 'log_request_license';
    public $incrementing = true;
    public $timestamps = true;
}

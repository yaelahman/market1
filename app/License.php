<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $table = 'license';
    public $incrementing = true;
    public $timestamps = true;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fail extends Model
{
    protected $fillable = [
        'ic','name', 'phone', 'address','result','status',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'ic','name', 'phone', 'address','result','status',
    ];
}

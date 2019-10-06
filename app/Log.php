<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['first_name', 'last_name', 'role', 'activity', 'time_in', 'time_out', 'description'];
}

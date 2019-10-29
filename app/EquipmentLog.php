<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentLog extends Model
{
    protected $fillable = ['given_id', 'name', 'equipment_description', 'user_id', 'user_name', 'use_description', 'time_in', 'time_out'];
}

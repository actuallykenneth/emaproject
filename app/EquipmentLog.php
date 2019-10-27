<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentLog extends Model
{
    protected $fillable = ['name', 'equipment_description', 'user_name', 'use_description', 'time_in', 'time_out'];
}

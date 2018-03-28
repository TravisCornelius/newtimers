<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    protected $fillable = ['id', 'location_id', 'lane_id', 'start_time'];
}

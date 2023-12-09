<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courierzone extends Model
{
    use HasFactory;

    function rel_to_courier() {
        return $this->belongsTo(courier::class, 'courier_id');
    }

    function rel_to_city() {
        return $this->belongsTo(city::class, 'city_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;


    function rel_to_courier() {
        return $this->belongsTo(courier::class, 'courier_id');
    }
}

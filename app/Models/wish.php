<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wish extends Model
{
    use HasFactory;


    //rel to product
    function rel_to_pro(){
        return $this->belongsTo(product::class, 'product_id');
    }
}

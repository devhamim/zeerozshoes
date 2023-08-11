<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;


    protected $guarded = ['id'];

    //rel to product
    function rel_to_pro(){
        return $this->belongsTo(product::class, 'product_id');
    }

    //rel to category
    function rel_to_color(){
        return $this->belongsTo(color::class, 'color_id');
    }
    
    //rel to category
    function rel_to_size(){
        return $this->belongsTo(size::class, 'size_id');
    }
}

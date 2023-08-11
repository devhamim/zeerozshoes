<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderproduct extends Model
{
    use HasFactory;

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
    //rel to customer
    function rel_to_customer(){
        return $this->belongsTo(customerlogin::class, 'customer_id');
    }
    
}

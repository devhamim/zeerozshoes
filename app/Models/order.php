<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    //rel to product
    function rel_to_pro(){
        return $this->belongsTo(product::class, 'product_id');
    }
    //rel to customer
    function rel_to_customer(){
        return $this->belongsTo(customerlogin::class, 'customer_id');
    }
}

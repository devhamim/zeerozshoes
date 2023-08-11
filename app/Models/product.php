<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //rel to category
    function rel_to_cat(){
        return $this->belongsTo(category::class, 'category_id');
    }

    // rel to subcategory
    function rel_to_subcat(){
        return $this->belongsTo(subCategory::class, 'subcategory_id');
    }
    // rel to brand
    function rel_to_brand(){
        return $this->belongsTo(brand::class, 'brand_id');
    }
    // rel_to_inventore
    function rel_to_inventore(){
        return $this->hasMany(inventory::class, 'product_id');
    }
}

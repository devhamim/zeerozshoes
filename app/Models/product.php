<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function rel_to_category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    function rel_to_brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    function rel_to_user() {
        return $this->belongsTo(User::class, 'added_by');
    }
    
    function rel_to_size() {
        return $this->hasMany(Inventory::class, 'product_id', 'id');
    }

    function rel_to_inventories() {
        return $this->hasMany(Inventory::class, 'product_id');
    }

    // function rel_to_product() {
    //     return $this->belongsTo(Product::class, 'product_id');
    // }
    // function products() {
    //     $this->hasMany(Product::class, 'category_id', 'id');
    // }
    // public function products() {
    //     return $this->hasMany('App\Models\Inventory', 'size_id', 'id')->where('status', 1);
    // }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}

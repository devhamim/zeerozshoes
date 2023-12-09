<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function products() {
        return $this->hasMany('App\Models\Product', 'brand', 'id')->where('status', 1);
    }
    // public function products() {
    //     return $this->hasMany('App\Models\Product', 'category_id', 'id')->where('status', 1);
    // }
}

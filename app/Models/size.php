<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    public function products() {
        return $this->hasMany('App\Models\Inventory', 'size_id', 'id')->where('status', 1);
    }
    // public function products() {
    //     return $this->hasMany('App\Models\Inventory', 'size_id', 'id')->where('status', 1);
    // }
}

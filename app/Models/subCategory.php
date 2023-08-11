<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function rel_to_cat(){
        return $this->belongsTo(category::class, 'category');
    }
}

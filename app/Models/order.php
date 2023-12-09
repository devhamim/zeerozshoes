<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function rel_to_product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
    function rel_to_courier() {
        return $this->belongsTo(courier::class, 'courier_id');
    }
    function rel_to_city() {
        return $this->belongsTo(city::class, 'city_id');
    }
    function rel_to_courierzone() {
        return $this->belongsTo(courierzone::class, 'courier_zone_id');
    }
    public function rel_to_billing(){
        return $this->hasOne(Billingdetails::class, 'order_id', 'order_id');
    }
    public function rel_to_orderpro(){
        return $this->hasMany(OrderProduct::class, 'order_id', 'order_id');
    }
}

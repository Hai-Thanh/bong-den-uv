<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $guarded = [];


    public function productOrder(){
        return $this->belongsToMany(Products::class, 'order_detail', 'order_id' , 'product_id');
    }

}

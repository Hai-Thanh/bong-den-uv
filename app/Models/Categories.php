<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $guarded = [];

    // Quan hệ category->product;... từ bảng cha đến bảng con .
    public function products(){
        return $this->hasMany(Products::class, 'category_id');
    }

}

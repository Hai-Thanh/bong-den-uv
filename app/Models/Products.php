<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function category(){ // từ bảng con đến bảng cha
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function imageMutiple(){
        return $this->hasMany(ProductImage::class , 'product_id');
    }
    
    public function tagsMutiple(){
        return $this->belongsToMany(Tag::class, 'product_tag' , 'product_id', 'tag_id')->withTimestamps();
    }


}

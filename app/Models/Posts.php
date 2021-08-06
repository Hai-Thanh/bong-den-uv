<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Posts extends Model
{
    use HasFactory;


    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $guarded = [];


    public function userPost(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tagPost(){

        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

}

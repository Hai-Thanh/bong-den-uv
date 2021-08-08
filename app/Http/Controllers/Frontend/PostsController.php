<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct(Posts $posts)
    {
        $this->posts = $posts;

    }
   
    public function detailPost($id){
        $post = $this->posts->find($id);


        return view('frontend.posts.post-detail', compact('post'));

    }

    public function postList(){
        $posts = $this->posts->all();
        return view('frontend.posts.list-posts', compact('posts'));

    }

    public function aboutus(){
        
        $aboutus = $this->posts->take(1)->get();
        return view('frontend.posts.aboutus', compact('aboutus'));

    }

    public function contact(){

        return view('frontend.contactus.contact');
    }
}

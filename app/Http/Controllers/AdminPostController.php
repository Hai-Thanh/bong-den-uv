<?php

namespace App\Http\Controllers;

use App\Models\Post_tag;
use App\Models\Posts;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminPostController extends Controller
{

    public function __construct(Posts $posts)
    {
        $this->posts = $posts;

    }
    public function index()
    {
        $posts = Posts::all();

        $posts->load('userPost');

        return view('admin.posts.index', compact('posts'));
    }

    public function add()
    {

        $tags = Tag::all();
        return view('admin.posts.add', compact('tags'));
    }


    public function store(Request $request)
    {
        $posts = Posts::create([
            'title' => $request->title,
            'image_path' => $request->image_path,
            'description'=>$request->description,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);
        foreach ($request->tag as $k => $tag) {
            Post_tag::create([
                'tag_id' => $tag,
                'post_id' => $posts->id
            ]);
        }

        return redirect()->route('posts')->with('status', 'Thêm bài viết thành công');
    }

    public function edit($id){

        $post = $this->posts->find($id);
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'tags'));

    }

    public function update($id, Request $request){
        $post = $this->posts->find($id);
        if ($request->image_path  != $post->image_path) {
            $delete_post = str_replace("http://localhost:8000/storage", '/public', $post->image_path);
            Storage::delete($delete_post);
        }
        Post_tag::where('post_id', $id)->delete();
        $post->update([
            'title' => $request->title,
            'image_path' => $request->image_path,
            'description'=>$request->description,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);
        if($request->tag){
            foreach ($request->tag as $k => $tag) {
                Post_tag::create([
                    'tag_id' => $tag,
                    'post_id' => $post->id
                ]);
            }
        }
         return redirect()->route('posts')->with('status', 'Cập nhật bài viết thành công');
    }
    public function delete($id){
        try {
            $posts =  $this->posts->find($id);
            Post_tag::where('post_id', $id)->delete();
            $delete_posts = str_replace("http://localhost:8000/storage", '/public', $posts->image_path);
            Storage::delete($delete_posts);
            $posts->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("message" . $e->getMessage() . 'Line: ' . $e->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }
}

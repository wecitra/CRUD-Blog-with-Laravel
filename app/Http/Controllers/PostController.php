<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        return view('posts.posts', [
            "posts" => Post::all()
        ]);
    }

    public function show($slug){
        return view('posts.post', [
            "post" => Post::find($slug)
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
//con all mi da collection , mettendo
//il toArray ci da l'array della collection
        $posts = Post::all();//->toArray;

        $data = [
            'posts'=> $posts
        ];

        return view('guest.post.index', $data);

    }
    public function show($slug){

        $post = Post::where('slug',$slug)->first();
        
        $data = [
            'posts'=> $post
        ];

        return view('guest.post.show', $data);
    }
}

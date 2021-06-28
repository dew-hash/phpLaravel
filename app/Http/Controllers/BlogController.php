<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
   public function index(){
       $posts = Post::all();
       return view('pages.home', compact('posts'));
   }

   public function createPost(){
       return view('pages.add-post');
   }

   public function store(Request $request){
       Post::create([
           'title' => request('title'),
           'content' => request('content')
       ]);
       return redirect('/');
   }

   public function show(Post $post){
       return view('pages.show-post', compact('post'));

   }
}

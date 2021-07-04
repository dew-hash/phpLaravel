<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illumaniate\Support\Facades\Starage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    public function index(){
        $posts = Post::paginate(10);
        return view('pages.home', compact('posts'));
    }

    public function createPost(){
        return view('pages.add-post');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'title'=>'required|unique:post|max:255',
            'content'=>'required',
            'img'=>'mimes:jpg,jpeg,png|required|max:10000' 
            
        ]);
        $path = $request->file('img')->store('public/images');
        $filename = str_replace('public/',"",$path);
        Post::create([
            'title'=>request('title'),
            'content'=>request('content'),
            'img'=>$filename, 
            'user_id'=>Auth::id()
        ]);
        return redirect('/');
    }

    public function show(Post $post){
        return view('pages.show-post', compact('post'));

    }
    
    public function destroy(Post $post){
        if(Gate::allows('destroy', $post)){
            Storage::delete(storage_path('app/public'.$post->img));
            $post->delete();
            return redirect('/');
        }
        dd('Neturite tam teisės.');
    }

    public function update(Post $post){
        if(Gate::allows('update', $post)){
            return view('pages.update', compact('post'));
        }
        dd('Jūs neturite tam teisės.');
    }

    public function storeUpdate(Request $request, Post $post){
        if($request->file()){
            Storage::delete('app/public'.$post->img);
            $path = $request->file('img')->store('public/images');
            $filename = str_replace('public/', "", $path);
            Post::where('id', $post->id)->update(['img'=>$filename]);
        }
        Post::where('id',$post->id)->update($request->only(['title','content']));
        return redirect('/post/'.$post->id);
    }
}

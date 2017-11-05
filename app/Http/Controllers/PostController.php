<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view("post/index", compact('posts'));
    }
   
    public function show(){
    //echo "show";
    }
   
     public function create(){
      //權限控制？
      //echo "create";  
      return view("post/create");
        
    }
   
     public function store(){
     
     //dd(request());
     $post = new Post;
     $post->title = request()->title;
     $post->content = request()->content;
     if($post->save() == true)
     {
         return redirect('posts');
     }
     else
     {   //這邊應該要順便回傳error message
         return redirect('posts/create');
     }                
     
    }
    public function edit(){
        $post_id = request()->post;
        $post = Post::find($post_id);
        return view('post/edit', compact('post'));
    }
    public function update(){
        echo $post->id;
    
    }
    public function delete(){


    }



}

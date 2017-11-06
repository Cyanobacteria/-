<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
     public function index()
     {
         $posts = Post::orderBy('created_at', 'desc')->get();
         return view("post/index", compact('posts'));
     }
   
     public function show(Post $post)
     {   //echo $post->title;
         //dd($post);
         return view('post/show', compact('post'));
         
     }
   
     public function create()
     {
        //權限控制？
        //echo "create";  
        return view("post/create");
        
     }
   
     public function store()
     {
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
     public function edit(/*Post $post*/)
     {
        $post_id = request()->post;
        $post = Post::find($post_id);
        return view('post/edit', compact('post'));
     }
     public function update(/*Post $post*/)
     {
       //dd($post); 
        $post_id = request()->id;
        $post = Post::find($post_id);
        $post->title = request()->title; 
        $post->content = request()->content;
        
        if($post->save() == true)
        {
            return redirect('posts');
        }
        else
        {   //view('file path'); redirect('route url');
            return redirect("posts/{$post_id}/edit");
        } 
     }
     public function delete($id)
     { 
       /*
       1.傳值方式有幾種？ 原生php way 跟laravel way 差在哪裡 又各有哪些？
       2.http method get post put patch delete
       3.慣例默認設置 有哪些？（可以寫最少code）
       */  
       if(Post::find($id)->delete() == true)
       {echo "成功"; }
       else
       {echo "失敗";} 
     }



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
//是否可以寫一個檔然後include進來？
//這樣就不用每個需要的都再寫一次
use Illuminate\Support\Facades\Auth;
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
        
        //echo "create";
        if(Auth::check())
        {  
            return view("post/create");
        }
        else
        {
            return redirect('posts');
        }
     }
   
     public function store(Post $post)
     {   //dd($post);
         //$post = new Post;
         //使用綁定是這樣寫？ 
         $post->title = request()->title;
         $post->content = request()->content;
         if($post->save() == true)
         {
             return redirect('posts/#post' . $post->id);
             
         }
         else
         {   //這邊應該要順便回傳error message
         return redirect('posts/create');
         } 
                        
     }
     public function edit(/*Post $post*/  /*$post*/)
     {   //dd($post);
         //dd(request()->post);
         $post_id = request()->post;
         $post = Post::find($post_id);
         return view('post/edit', compact('post'));
     }
     public function update(/*Post $post*/ /*Request $request*/)
     {   //No query results for model 不知道是哪邊沒寫好，讓默認設置不能用 
         //其他方法都可以用，猜是因為route 沒用resource一個一個建可能會有問題，再驗證
         //dd($post);
         //dd($request);
         /*
         如果說方法有至少四種
         Post $post >>連資料都直接塞好了
         Request $request
         request()
         action name($var) 對應 /example/{var} $var直接拿來用，也會傳進來
         哪種比較好？應該說優劣何在？        
         */ 
         $post_id = request()->id;
         $post = Post::find($post_id);
         $post->title = request()->title; 
         $post->content = request()->content;
        
         if($post->save() == true)
         {   //返回單筆顯示
             return redirect('posts/'. $post->id);
             //返回主頁並定位至目標post
             //return redirect('posts/#post' . $post->id);
         }
         else
         {   //view('file path'); redirect('route url');
             return redirect("posts/{$post_id}/edit");
         } 
     }
     public function delete(/*$id*/)
     { 
       /*
       1.傳值方式有幾種？ 原生php way 跟laravel way 差在哪裡 又各有哪些？
       2.http method get post put patch delete
       3.慣例默認設置 有哪些？（可以寫最少code）
       */  
       $post_id = request()->post;
       if(Post::find($post_id)->delete() == true)
       {
           return redirect('posts');
           //要寫個flash message
       }
       else
       {echo "失敗";} 
     }



}

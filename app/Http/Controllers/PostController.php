<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
       /*
       1.傳值方式有幾種？ 原生php way 跟laravel way 差在哪裡 又各有哪些？
       2.http method get post put patch delete
       3.慣例默認設置 有哪些？（可以寫最少code）
       */  
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
     public function index()
     {   
         $posts = Post::orderBy('created_at', 'desc')->get();
         return view("post/index", compact('posts'));
     }
     public function show(Post $post)
     {   //使用model綁定
         return view('post/show', compact('post'));
     }
     public function create()
     {
        //有登入才可以發文
        if(Auth::check())
        {  
            return view("post/create");
        }
        else
        {
            return redirect('posts');
        }
     }
     //compact方法並不是何時都合適這樣用 
     public function store(/*Post $post*/)
     {   //dd($post);
         //不曉得為什直接存會放在/storage/app/ 而不是storage/app/public/
         $post = new Post;
         $path = request()->file('image')->storePublicly($post->user_id);
         //預設的公開路徑是在/storage/app/public/  所以把檔案移動
         Storage::move($path,"public/$path");
         //公開的路徑是/public/這個位置,使用命令創造了路徑連結 /public/storage/  等於  /storage/app/public/
         $image = "/storage/" . $path;
         //要存入的值
         $post->title = request()->title;
         $post->content = request()->content;
         $post->user_id = \Auth::id();
         $post->image = $image;
         //$title = request()->title;
         //$content = request()->content;
         //$user_id = \Auth::id();
         //$path = request()->file('image')->store(time());
         //$path = request()->image->store(time());
         if($post->save()  /*Post::create(compact('title', 'content', 'user_id', 'image')) == true*/)
         {
             //有辦法捕獲剛剛才新建的文章的id嗎?
             
             //return redirect('posts/#post' . $post->id);
             return redirect('posts');
         }
         else
         {   //這邊應該要順便回傳error message
         return redirect('posts/create');
         } 
     }
     public function edit(/*Post $post*/  /*$post*/)
     {   
         
         //實現是實現了，那如果\Auth::id()不存在呢？ 更好的實現方法是？
         $post_id = request()->post;
         $post = Post::find($post_id);
         //dd($post->user_id);
         if($post->user_id == \Auth::id())
         { 
             return view('post/edit', compact('post'));
         }
         else
         {
             return redirect('posts');
         }
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

         //如果沒登入也不是文章所有人就會跳回首頁 
         $post_id = request()->id;
         $post = Post::find($post_id);
         if(Auth::check() and $post->user_id == Auth::id() )
         {
             $post->title = request()->title; 
             $post->content = request()->content;
             //這裡會有批量賦值問題嗎???
             if ($post->save())
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
         return redirect('posts'); 
     }
     public function delete(/*$id*/)
     { //算是功能完成
       //要同時登入並user->id == post->user_id 才會刪除 
       $post_id = request()->post;
       $post = Post::find($post_id);
              
       if(Auth::check() and $post->user_id == Auth::id() )
       {
       $post->delete();
           //要寫個flash message
       }
       return redirect('posts');
     }



}

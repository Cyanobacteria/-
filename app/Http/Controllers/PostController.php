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
    echo "show";
    }
   
     public function create(){
      echo "create";  
      //return view("post/create");
        
    }
   
     public function store(){


    }
    public function edit(){


    }
    public function update(){


    }
    public function delete(){


    }



}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //問題是使用$post->save()不需要下面這行
    //使用Post::create 需要
    //使用laravel的方法會有更高的安全性
    protected $fillable = ['title', 'content', 'user_id'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }





}

@extends('layouts.template_one')
@section('content')


  <h1 class="my-4">文章列表
    <small></small>
  </h1>
  <!-- Blog Post -->
  <div class="card mb-4">
    <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">
    <div class="card-body">
      <h2 class="card-title">{{$post->title}}</h2>
      <p class="card-text">{{$post->content}}</p>
     <!-- <a href="{{url('/posts/' . $post->id)}}" class="btn btn-primary">Read More &rarr;</a>-->
    </div>
    <div class="card-footer text-muted">
      {{$post->created_at}} by <!-- 這裡要寫{{$post->user}} -->
      <a href="#">{{ $post->user->name }}</a>
    </div>
  </div>
    @if ($post->user_id == \Auth::id())
    <a href="{{ url("/posts/" . $post->id . "/edit") }}" class="btn btn-primary btn-lg">編輯</a>
    @endif
    <a href="{{url('/posts' . '#post' . $post->id)}}" class="btn btn-primary btn-lg">返回</a>


@endsection

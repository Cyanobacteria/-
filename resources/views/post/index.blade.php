@extends('layouts.template_one')
@section('content')


  <h1 class="my-4">文章列表
    <small></small>
  </h1>
  @foreach($posts as $post)
  <!-- Blog Post -->
  <div id="{{'post' . $post->id}}" class="card mb-4">
    <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">
   <!-- <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap"> -->
    <div class="card-body">
      <h2 class="card-title">{{$post->title}}</h2>
      <p class="card-text">{{$post->content}}</p>
      <a href="{{url('/posts/' . $post->id)}}" class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
      {{$post->created_at}} by 
      <a href="#">{{ $post->user->name }}</a>
      <!-- 要在model 中建立關聯後再來改 -->
    </div>
  </div>
  @endforeach

  
 <!--
  <ul class="pagination justify-content-center mb-4">
    <li class="page-item">
      <a class="page-link" href="#">&larr; Older</a>
    </li>
    <li class="page-item disabled">
      <a class="page-link" href="#">Newer &rarr;</a>
    </li>
  </ul>
  -->

@endsection

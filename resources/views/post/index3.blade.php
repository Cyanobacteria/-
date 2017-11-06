@extends('layouts.template_one')
@section('content')


  <h1 class="my-4">文章列表
    <small></small>
  </h1>
  @foreach($posts as $post)
  <!-- Blog Post -->
  <div class="card mb-4">
    <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
    <div class="card-body">
      <h2 class="card-title">{{$post->title}}</h2>
      <p class="card-text">{{$post->content}}</p>
      <a href="{{url('/posts/' . $post->id)}}" class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
      <div class="row">
      <div class="pull-right">
      {{$post->created_at}} by <!-- 這裡要寫{{$post->user}} -->
      <a href="#">Start Bootstrap</a>
      </div>
      <div class="pull-left">
      <a href="{{ url("/posts/" . $post->id . "/edit") }}" class="btn btn-primary btn-lg pull-right">編輯</a>
      </div>
      </div>
    </div>
  </div>
  @endforeach


  <!-- Pagination -->
  <ul class="pagination justify-content-center mb-4">
    <li class="page-item">
      <a class="page-link" href="#">&larr; Older</a>
    </li>
    <li class="page-item disabled">
      <a class="page-link" href="#">Newer &rarr;</a>
    </li>
  </ul>


@endsection

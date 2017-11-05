@extends('layouts.template_one')
@section('content')

 <h1 class="my-4">編輯文章</h1>
<br><!-- action 這個是put 方法 返回按鈕  -->
<form action="{{url('/posts/{post}')}}" method="post">
    {!! csrf_field() !!}
    <input type="hidden" name="_method" value="put" >
    <input type="hidden" name="id" value="{{ $post->id }}">
    <!-- 之後要寫成當前用戶 -->
    <input type="text" name="title" value="{{ $post->title }}" class="form-control" required="required" placeholder="请輸入title">
    <br>
    <textarea name="content" rows="10" class="form-control" required="required" >{{ $post->content }} </textarea>
    <br>
    <button class="btn btn-lg">送出</button>
</form>


@endsection

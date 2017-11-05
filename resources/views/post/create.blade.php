@extends('layouts.template_one')
@section('content')

 <h1 class="my-4">新增文章</h1>
<br>
<form action="{{url('/posts')}}" method="post">
    {!! csrf_field() !!} 
    <input type="text" name="title" class="form-control" required="required" placeholder="请輸入title">
    <br>
    <textarea name="content" rows="10" class="form-control" required="required" placeholder="请輸入content"></textarea>
    <br>
    <button class="btn btn-lg">送出</button>
</form>


@endsection

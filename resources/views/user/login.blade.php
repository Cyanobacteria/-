@extends('layouts.template_one')

@section('content')
@include('include.errors')
<form action="{{url('login')}}" method="POST">
    {!! csrf_field() !!}
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email" id="Email" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="Password" placeholder="Password">
  </div>
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" name="is_remember" class="form-check-input">
      記住我
    </label>
  </div>
  <button type="submit" class="btn btn-primary">登入</button>
</form>

@endsection

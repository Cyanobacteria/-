@extends('layouts.template_one')

@section('content')

<form action="{{url('register')}}" method="POST">
    {!! csrf_field() !!}
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email" id="Email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="Password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password Confirmation</label>
    <input type="password" class="form-control" name="password_confirmation" id="PasswordConfirmation" placeholder="Password">
  </div>
<!--
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      Check me out
    </label>
  </div>
-->
  <button type="submit" class="btn btn-primary">註冊</button>
</form>

@endsection

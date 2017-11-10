<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container">
    <a class="navbar-brand" href="#">多用戶文章分享</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/posts')}}">首頁
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <!--
        <li class="nav-item">
          <a class="nav-link" href="{{url('/posts/create')}}">發布</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        -->
        @if (\Auth::check())
        <div class="dropdown">
            <button class="btn btn-log dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      {{\Auth::user()->name}}
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{url('posts/create')}}">發布</a>
                <a class="dropdown-item" href="#">我的檔案</a>
                <a class="dropdown-item" href="{{ url('logout') }}">登出</a>
            </div>
        </div>
        @else
        <li class="nav-item active">
          <a class="nav-link" href="{{url('login')}}">登入
            <span class="sr-only">(current)</span>
          </a>
        </li>
        @endif

      </ul>
    </div>
  </div>
</nav>

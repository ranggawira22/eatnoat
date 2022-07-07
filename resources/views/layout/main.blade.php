<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">.disclaimer { display: none; }</style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="\bootstrap4\css\bootstrap.min.css">
  <link rel="stylesheet" href="\css\main.css">
</head>
<body>
  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-light pl-5">
    <a class="navbar-brand font-weight-bold" href="/">EAT & OAT</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="/">Home</a>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Menu List
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/all">All Menu</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/category/chiapudding">Chiapudding</a>
            <a class="dropdown-item" href="/category/dessert">Dessert</a>
            <a class="dropdown-item" href="/category/basic">Basic</a>
            <a class="dropdown-item" href="/category/premium">Premium</a>
            <a class="dropdown-item" href="/category/oatmilk">Oatmilk</a>
          </div>
        </li>
        @if (auth('admin')->check())
          @if (auth('admin')->user()->admin == "user")
           <a class="nav-item nav-link" href="/checkout">Foodcart</a>
           <a class="nav-item nav-link" href="/history">History</a>
          @endif
          @if (auth('admin')->user()->admin == "admin")
          <a class="nav-item nav-link" href="/admin">Item</a>
          <a class="nav-item nav-link" href="/admin/history">History</a>
          @endif
        @endif
      </div>
    </div>

    @if (!auth('user')->check() && !auth('admin')->check())
    <div class="auth-button">
      
      
      <div class="drop-container d-inline">
        <a class="drop-hover text-decoration-none text-white btn btn-success" href="" id="profileBtn" role="button">
          Sign in
        </a>
        <div class="drop-profile" id="drop-profile">
          <form action="/login" method="post">
            @csrf
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" id="email" placeholder="e.g. hello@viresto.com">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-success">Login</button>
          </form>
        </div>
      </div>
      <a href="/register" class="btn btn-outline-primary">Sign up</a>
    </div>
    @endif
    
    @if (auth('admin')->check())
    <div class="drop-container">
      <a class="drop-hover text-decoration-none" href="" id="profileBtn" role="button">
        {{ auth('admin')->user()->name }}&blacktriangledown;
      </a>
      <div class="drop-profile" id="drop-profile">
        <a class="drop-link" href="/edit-profile">Edit Profile</a>
        <a class="drop-link" href="/setting">Settings</a>
        <a class="drop-link" href="/logout">Logout</a>
      </div>
    </div>
    @else
      @if (auth('user')->check())
      <div class="drop-container">
        <a class="drop-hover text-decoration-none" href="" id="profileBtn" role="button">
          {{ auth('user')->user()->name }}&blacktriangledown;
        </a>
        <div class="drop-profile" id="drop-profile">
          <a class="drop-link" href="/edit-profile">Edit Profile</a>
          <a class="drop-link" href="/setting">Settings</a>
          <a class="drop-link" href="/logout">Logout</a>
        </div>
      </div>
      @endif
    @endif
  </nav>


  <div id="content">
    @yield('content')
  </div>



  <footer class="">
    <div id="footer1" class="footer-links">
      <div class="footer">
        <h5>ViResto</h5>
        <a href="/">Home</a>
        <a href="">About</a>
        <a href="#">Contact</a>
      </div>
      <div class="footer">
        <h5>Developer</h5>
        <a href="">API</a>
        <a href="">Career</a>
        <a href="">License</a>
      </div>
      <div class="footer">
        <h5>Customer</h5>
        <a href="">Terms of Use</a>
        <a href="">Privacy Policy</a>
        <a href="">Refund Policy</a>
      </div>
    </div>
    <div id="footer2" class="footer-copy text-center">
      <span>&copy;2022 | By <a href="#">Rangga-Darren</a></span>
    </div>
  </footer>


  <script type="text/javascript" src="\jquery\jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="\bootstrap4\js\bootstrap.js"></script>
  <script type="text/javascript" src="\js\script.js"></script>
  <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
</body>
</html>
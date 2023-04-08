<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>HTML5 Login Form with validation Example</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="/css/buyerlogin.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="login-form-wrap">
  <h2>Login</h2>
  <form id="login-form" action="{{route('login-user')}}" method="post">
    @if (Session::has('Success!'))
    <div class="alert alert-success!">{{Session::get('Success!')}}</div>
    @endif
    @if (Session::has('Failure!'))
    <div class="alert alert-danger!">{{Session::get('Failure!')}}</div>
    @endif
    @csrf
    <p>
    <input type="email" id="email" name="email" placeholder="Email Address" required><i class="validation"><span></span><span></span></i>
    <br><span class="text-danger">@error('email') {{$message}}@enderror</span>
    </p>
    <p>
    <input type="password" id="password" name="password" placeholder="Enter Password" required><i class="validation"><span></span><span></span></i>
    <br><span class="text-danger">@error('password') {{$message}}@enderror</span>
    </p>
    <p>
    <input type="submit" id="login" value="Login">
    </p>
  </form>
  <div id="create-account-wrap">
    <p>Not a member? <a href="form">Create Account</a><p>
  </div><!--create-account-wrap-->
</div><!--login-form-wrap-->
<!-- partial -->

</body>
</html>

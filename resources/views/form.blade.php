<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Strathmore Registration</title>
    <script defer src="chavascript.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<h1>Buyer Registration</h1>
<form id="form" action="/buyer" method="POST">
    @if (Session::has('Success!'))
        <div class="alert alert-success!">{{Session::get('Success!')}}</div>
    @endif
    @if (Session::has('Failure!'))
        <div class="alert alert-danger!">{{Session::get('Failure!')}}</div>
    @endif
     @csrf
	 <div>
            <label for="name">Enter name:</label><br>
            <input required type="text" id="Name" name="name"><br>
            <span class="text-danger">@error('name') {{$message}}@enderror</span>
     </div>
      <div>
            <label for="email">Enter email</label><br>
            <input required type="email" id="email" name="email"><br>
            <span class="text-danger">@error('email') {{$message}}@enderror</span>
      </div>
       <div>
       <label for="password">password</label><br>
            <input required type="password" id="password" name="password"><br>
            <span class="text-danger">@error('password') {{$message}}@enderror</span>

      </div>
       <div>
       <label for="telephone">Enter number</label><br>
            <input required type="number" id="telephone" name="telephone" ><br>
            <span class="text-danger">@error('telephone') {{$message}}@enderror</span>
       </div>

       <div>
            <button id="submit">submit</button>
        </div>
        <p>Member?<a href="buyerlogin">Login</a><p>
</form>

</body>
</html>

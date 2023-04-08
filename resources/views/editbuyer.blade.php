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
<h1>Buyer Editing</h1>
<form id="form" action="/updatebuyer" method="POST">
    @if (Session::has('Success!'))
        <div class="alert alert-success!">{{Session::get('Success!')}}</div>
    @endif
    @if (Session::has('Failure!'))
        <div class="alert alert-danger!">{{Session::get('Failure!')}}</div>
    @endif
     @csrf
     <input type="hidden" name="id" value="{{$buyers->id}}">
	 <div>
            <label for="name">Enter name:</label><br>
            <input required type="text" id="Name" name="name" value="{{$buyers->name}}"><br>
            <span class="text-danger">@error('name') {{$message}}@enderror</span>
     </div>
      <div>
            <label for="email">Enter email</label><br>
            <input required type="email" id="email" name="email" value="{{$buyers->email}}"><br>
            <span class="text-danger">@error('email') {{$message}}@enderror</span>
      </div>

       <div>
       <label for="telephone">Enter number</label><br>
            <input required type="number" id="telephone" name="telephone" value="{{$buyers->telephone}}"><br>
            <span class="text-danger">@error('telephone') {{$message}}@enderror</span>
       </div>
       <div>
        <button id="submit">submit</button>
    </div>

</form>

<p>Member?<a href="buyerlogin">Login</a><p>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/buyerpage.css">
	<title></title>
</head>
<body>
<h1> Welcome!</h1>
@if (Session::has('Success!'))
        <div class="alert alert-success!">{{Session::get('Success!')}}</div>
    @endif

<table width="50%" th="text-align left" border="1px" style="margin-left:auto; margin-right:auto; text-align:center;">
    <thead>
        <th>#</th>
        <th>name</th>
        <th>email</th>
        <th>password</th>
        <th>telephone</th>
        <th>action</th>
    </thead>
    <tbody>
        @php
            $i=1;
        @endphp
        @foreach ($buyers as $b )
        <tr>
            <td>{{$i++}}</td>
            <td>{{$b->name}}</td>
            <td>{{$b->email}}</td>
            <td>{{$b->password}}</td>
            <td>{{$b->telephone}}</td>
            <td><a href="{{url('editbuyer/'.$b->id)}}">Edit</a>|<a href="{{url('deletebuyer/'.$b->id)}}" class="t" title="Are you sure you want to delete your details?">delete</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<p><a href="logout">Logout</a></p>
</body>
</html>

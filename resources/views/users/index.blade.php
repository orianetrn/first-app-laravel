<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>

<body>

<h1>Users :</h1>

@if(session("message"))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif

<ul>
    @foreach($users as $user)
        <li><a href="{{ route ('users.show',$user)}}">{{ $user->name }}</a></li>
    @endforeach
</ul>

<form action="{{route('users.form_create', $user)}}">
    <button type="submit">Ajouter un user</button>
</form>

</body>
</html>

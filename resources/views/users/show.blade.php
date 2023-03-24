<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$user->name}}</title>
</head>

<body>

<h1>{{$user->name}}</h1>

<p>Email : {{$user->email}}</p>
<p>Créé le : {{$user -> created_at}}</p>
<p>Anniversaire : {{$user -> date_de_naissance -> translatedFormat('d F')}}</p>
<p>Age : {{now()->diffInYears($user->date_de_naissance)}}</p>

<form action="{{route('users.form_update', $user)}}">
    <button type="submit">Modifier les informations</button>
</form>

<form action="{{route('users.destroy', $user)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Supprimer</button>
</form>



</body>
</html>

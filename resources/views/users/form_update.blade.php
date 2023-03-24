<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<h1>Modifier les informations de {{$user->name}} :</h1>

<form action="{{route('users.update', $user)}}" method="POST">
    @csrf
    @method('PUT')

    <label>Nom
        <input type="text" name="nom" value="{{$user->name}}">
    </label>
    @error('nom')
    <div class="alert alert-danger"><p class="erreur">{{$message}}</p></div>
    @enderror

    <label>Email
        <input type="email" name="email" value="{{$user->email}}">
    </label>
    @error('email')
    <div class="alert alert-danger"><p class="erreur">{{$message}}</p></div>
    @enderror

    <label>Date de naissance
        <input type="date" name="date_naissance" value="{{$user->date_de_naissance->toDateString()}}">
    </label>
    @error('date_naissance')
    <div class="alert alert-danger"><p class="erreur">{{$message}}</p></div>
    @enderror

    <label>Mot de passe
        <input type="password" name="mdp">
    </label>
    @error('mdp')
    <div class="alert alert-danger"><p class="erreur">{{$message}}</p></div>
    @enderror

    <label>Confirmation de mot de passe
        <input type="password" name="mdp_confirmation">
    </label>
    @error('mdp_confirmation')
    <div class="alert alert-danger"><p class="test">{{$message}}</p></div>
    @enderror

    <button type="submit">Modifier les informations</button>


{{--
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>il y a une erreur : {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
--}}

</form>

</body>
</html>

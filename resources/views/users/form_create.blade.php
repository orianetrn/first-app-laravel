<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite(['resources/css/app.css'])
</head>

<body>

<h1>Ajouter un user :</h1>

<form action="{{route('users.create', $user)}}" method="POST">
    @csrf
    @method('PUT')
    <label>Nom
        <input type="text" name="nom">
    </label>
    @error('nom')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <label>Email
        <input type="email" name="email">
    </label>
    @error('email')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <label>Date de naissance
        <input type="date" name="date_naissance">
    </label>
    @error('date_naissance')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <label>Mot de passe
        <input type="password" name="mdp">
    </label>
    @error('mdp')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <label>Confirmation de mot de passe
        <input type="password" name="mdp_confirmation">
    </label>
    @error('mdp_confirmation')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <button type="submit">Ajouter</button>

{{--
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
--}}

</form>

</body>
</html>

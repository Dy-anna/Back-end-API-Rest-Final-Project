@extends('layouts.app')

@section('content')
<h1>Connexion</h1>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button class="btn btn-primary">Se connecter</button>
</form>
@endsection

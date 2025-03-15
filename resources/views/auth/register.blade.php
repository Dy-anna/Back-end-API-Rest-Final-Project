@extends('layouts.app')

@section('content')
<h1>Inscription</h1>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <input type="password" name="password_confirmation" placeholder="Confirmer mot de passe" required>
    <button class="btn btn-primary">S'inscrire</button>
</form>
@endsection

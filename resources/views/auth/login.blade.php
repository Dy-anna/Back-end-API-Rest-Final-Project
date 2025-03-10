@extends('layouts.app') 
@section('title', 'Connexion')
@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold">Connexion</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" class="w-full p-2 border my-2">
            <input type="password" name="password" placeholder="Mot de passe" class="w-full p-2 border my-2">
            <button type="submit" class="w-full bg-blue-500 text-white p-2">Se connecter</button>
        </form>
    </div>
@endsection
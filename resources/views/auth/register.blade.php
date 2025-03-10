@extends('layouts.app')
@section('title', 'Inscription')
@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold">Inscription</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nom" class="w-full p-2 border my-2">
            <input type="email" name="email" placeholder="Email" class="w-full p-2 border my-2">
            <input type="password" name="password" placeholder="Mot de passe" class="w-full p-2 border my-2">
            <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" class="w-full p-2 border my-2">
            <button type="submit" class="w-full bg-green-500 text-white p-2">S'inscrire</button>
        </form>
    </div>
@endsection
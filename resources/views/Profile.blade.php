@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Mon Profil</h1>
    <p><strong>Nom :</strong> {{ auth()->user()->name }}</p>
    <p><strong>Email :</strong> {{ auth()->user()->email }}</p>
@endsection

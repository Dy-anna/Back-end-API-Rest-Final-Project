@extends('layouts.app')
@section('title', 'Accueil')
@section('content')
    <div class="text-center">
        <h1 class="text-3xl font-bold">Bienvenue sur Sport Events</h1>
        <p class="mt-4">Découvrez et participez à des événements sportifs près de chez vous.</p>
        <a href="{{ route('events.index') }}" class="bg-blue-500 text-white px-4 py-2 mt-5 inline-block">Voir les événements</a>
    </div>
@endsection
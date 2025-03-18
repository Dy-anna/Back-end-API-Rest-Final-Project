@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center">📌 Détails de l'Événement</h2>

    <div class="card shadow-sm p-4">
        <h3 class="card-title">{{ $event->title }}</h3>
        <p class="card-text"><strong>Description :</strong> {{ $event->description }}</p>
        <p><strong>Lieu :</strong> {{ $event->location }}</p>
        <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</p>
        <p><strong>Catégorie :</strong> {{ $event->category }}</p>
        <p><strong>Places disponibles :</strong> {{ $event->max_participants }}</p>

        @auth
        <form method="POST" action="{{ route('events.register', $event->id) }}">
        @csrf
        <button type="submit" class="btn btn-success w-100 mt-2">
            {{ auth()->user()->registrations()->where('event_id', $event->id)->exists() ? '❌ Se désinscrire' : '✅ S\'inscrire' }}
        </button>
    </form>

            <form method="POST" action="{{ route('events.favorite', $event->id) }}">
                @csrf
                <button type="submit" class="btn btn-warning w-100 mt-2">
                    ⭐ {{ auth()->user()->favorites()->where('event_id', $event->id)->exists() ? 'Retirer des Favoris' : 'Ajouter aux Favoris' }}
                </button>
            </form>
        @else
            <p class="alert alert-info">Connectez-vous pour vous inscrire ou ajouter en favori.</p>
        @endauth

        <a href="{{ route('home') }}" class="btn btn-secondary w-100 mt-3">⬅ Retour</a>
    </div>
</div>

@endsection

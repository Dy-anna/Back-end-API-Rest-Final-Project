@extends('layouts.app')

@section('content')

<div class="container text-center">
    <h1 class="display-4">📅 Événements Sportifs</h1>
    <p class="lead">Découvrez et participez aux meilleurs événements sportifs !</p>
    @auth
        <a href="{{ route('events.create') }}" class="btn btn-success mb-4">➕ Créer un événement</a>
    @endauth
    @auth
        <p class="alert alert-info">Bienvenue, {{ Auth::user()->name }} !</p>
    @endauth

    <div class="row mt-4">
        @forelse ($events as $event)
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                        <p><strong>Lieu :</strong> {{ $event->location }}</p>
                        <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</p>
                        <a href="#" class="btn btn-primary w-100">Voir plus</a>
                        
                    </div>
                </div>
            </div>
        @empty
        
            <p class="text-muted">Aucun événement disponible pour le moment.</p>
        @endforelse
        

    </div>
</div>

@endsection

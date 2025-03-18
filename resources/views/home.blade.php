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
    <div class="container">
    <h2 class="text-center">🔍 Rechercher un Événement</h2>

    <form method="GET" action="{{ route('events.search') }}" class="row g-3 mb-4">
        @csrf

        <!-- Recherche par mot-clé -->
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Rechercher par titre, description, lieu" value="{{ request('search') }}">
        </div>

        <!-- Filtre par catégorie -->
        <div class="col-md-3">
            <select name="category" class="form-control">
                <option value="">Toutes les catégories</option>
                <option value="Football" {{ request('category') == 'Football' ? 'selected' : '' }}>Football</option>
                <option value="Basketball" {{ request('category') == 'Basketball' ? 'selected' : '' }}>Basketball</option>
                <option value="Tennis" {{ request('category') == 'Tennis' ? 'selected' : '' }}>Tennis</option>
                <option value="Athlétisme" {{ request('category') == 'Athlétisme' ? 'selected' : '' }}>Athlétisme</option>
            </select>
        </div>

        <!-- Filtrer par date -->
        <div class="col-md-2">
            <input type="date" name="date_start" class="form-control" value="{{ request('date_start') }}">
        </div>

        <div class="col-md-2">
            <input type="date" name="date_end" class="form-control" value="{{ request('date_end') }}">
        </div>

        <!-- Bouton Rechercher -->
        <div class="col-md-1">
            <button type="submit" class="btn btn-primary w-100">🔎</button>
        </div>
    </form>
</div>

    <div class="row mt-4">
        @forelse ($events as $event)
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                        <p><strong>Lieu :</strong> {{ $event->location }}</p>
                        <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</p>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary w-100">Voir plus</a>

                        
                    </div>
                </div>
            </div>
        @empty
        
            <p class="text-muted">Aucun événement disponible pour le moment.</p>
        @endforelse
        

    </div>
    
</div>

@endsection

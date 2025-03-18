@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center">📌 Mes Événements</h2>

    <h3 class="mt-4">📅 Événements que j'ai créés</h3>
    <div class="row">
        @forelse ($createdEvents as $event)
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary w-100">Voir plus</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Vous n'avez créé aucun événement.</p>
        @endforelse
    </div>

    <h3 class="mt-4">✅ Événements où je suis inscrit</h3>
    <div class="row">
        @forelse ($registeredEvents as $event)
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary w-100">Voir plus</a>

                        <form method="POST" action="{{ route('events.register', $event->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100 mt-2">❌ Se désinscrire</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Vous n'êtes inscrit à aucun événement.</p>
        @endforelse
    </div>
</div>

@endsection

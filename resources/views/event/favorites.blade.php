@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center">❤️ Mes Favoris</h2>

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

                        <form method="POST" action="{{ route('events.favorite', $event->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100 mt-2">❌ Retirer des Favoris</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted text-center">Vous n'avez aucun événement en favori.</p>
        @endforelse
    </div>

    
</div>

@endsection

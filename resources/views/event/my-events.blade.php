@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center">📌 Mes Événements</h2>

    <div class="row mt-4">
        @forelse ($events as $event)
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                        <p><strong>Lieu :</strong> {{ $event->location }}</p>
                        <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</p>

                        <!-- ✅ Bouton Modifier (seulement pour l'utilisateur connecté) -->
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning w-100 mt-2">✏️ Modifier</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Vous n'avez créé aucun événement pour le moment.</p>
        @endforelse
    </div>

    

</div>

@endsection

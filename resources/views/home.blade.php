@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Événements Sportifs</h1>

    @auth
        <a href="{{ route('events.create') }}" class="btn btn-primary mb-6">Créer un événement</a>
    @endauth

    <div class="space-y-6">
        @forelse ($events as $event)
            <div class="border p-4 rounded-lg shadow bg-white">
                <h2 class="text-xl font-semibold">{{ $event->title }}</h2>
                <p class="text-gray-700 mt-2">{{ $event->description }}</p>
                <p class="mt-2"><strong>Lieu :</strong> {{ $event->location }}</p>
                <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</p>

                @auth
                    @if ($event->user_id !== auth()->id())
                        <form action="{{ route('events.register', $event->id) }}" method="POST" class="mt-4">
                            @csrf
                            <button class="btn btn-success">S'inscrire</button>
                        </form>
                    @endif
                @endauth
            </div>
        @empty
            <p class="text-gray-500">Aucun événement disponible pour le moment.</p>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $events->links() }} {{-- Pagination --}}
    </div>
@endsection

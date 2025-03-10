@extends('layouts.app')

@section('content')
<h1>Liste des événements</h1>

<a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Créer un événement</a>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Lieu</th>
            <th>Date</th>
            <th>Catégorie</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($events as $event)
        <tr>
            <td>{{ $event->title }}</td>
            <td>{{ $event->location }}</td>
            <td>{{ $event->date }}</td>
            <td>{{ $event->category }}</td>
            <td>
                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $events->links() }}
@endsection

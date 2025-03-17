@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center">✏️ Modifier l'événement</h2>

    <form method="POST" action="{{ route('events.update', $event->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title">Titre</label>
            <input type="text" name="title" class="form-control" value="{{ $event->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ $event->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="location">Lieu</label>
            <input type="text" name="location" class="form-control" value="{{ $event->location }}" required>
        </div>

        <div class="mb-3">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" value="{{ $event->date }}" required>
        </div>

        <div class="mb-3">
            <label for="category">Catégorie</label>
            <select name="category" class="form-control">
                <option value="Football" {{ $event->category == 'Football' ? 'selected' : '' }}>Football</option>
                <option value="Basketball" {{ $event->category == 'Basketball' ? 'selected' : '' }}>Basketball</option>
                <option value="Tennis" {{ $event->category == 'Tennis' ? 'selected' : '' }}>Tennis</option>
                <option value="Athlétisme" {{ $event->category == 'Athlétisme' ? 'selected' : '' }}>Athlétisme</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="max_participants">Nombre maximum de participants</label>
            <input type="number" name="max_participants" class="form-control" value="{{ $event->max_participants }}" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Mettre à jour</button>
    </form>
</div>

@endsection

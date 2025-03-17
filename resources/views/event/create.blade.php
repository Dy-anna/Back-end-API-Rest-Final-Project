@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center">➕ Créer un événement</h2>

    <form method="POST" action="{{ route('events.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title">Titre</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="location">Lieu</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="category">Catégorie</label>
            <select name="category" class="form-control">
                <option value="Football">Football</option>
                <option value="Basketball">Basketball</option>
                <option value="Tennis">Tennis</option>
                <option value="Athlétisme">Athlétisme</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="max_participants">Nombre maximum de participants</label>
            <input type="number" name="max_participants" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Créer l'événement</button>
    </form>
</div>

@endsection

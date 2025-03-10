@extends('layouts.app')

@section('content')
<h1>Modifier l'événement</h1>

<form action="{{ route('events.update', $event->id) }}" method="POST">
    @csrf
    @method('PUT')
    @include('events.partials.form', ['event' => $event])
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
@endsection

@extends('layouts.app')

@section('content')
<h1>Créer un événement</h1>

<form action="{{ route('events.store') }}" method="POST">
    @csrf
    @include('events.partials.form')
    <button type="submit" class="btn btn-success">Créer</button>
</form>
@endsection

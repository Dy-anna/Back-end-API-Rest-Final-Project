@extends('layouts.app')
@section('title', $event->title)
@section('content')
    <h2 class="text-3xl font-bold">{{ $event->title }}</h2>
    <p class="text-gray-600">Lieu : {{ $event->location }}</p>
    <p class="text-gray-600">Date : {{ $event->date }}</p>
    <p class="mt-4">{{ $event->description }}</p>
@endsection
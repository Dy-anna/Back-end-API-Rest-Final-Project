@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card shadow-sm p-4">
            <h2 class="text-center">📝 Inscription</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label>Nom</label>
                    <input type="text" name="name" class="form-control" placeholder="Votre nom" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Votre email" required>
                </div>
                <div class="mb-3">
                    <label>Mot de passe</label>
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                </div>
                <div class="mb-3">
                    <label>Confirmer mot de passe</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmez votre mot de passe" required>
                </div>
                <button type="submit" class="btn btn-success w-100">S'inscrire</button>
            </form>
        </div>
    </div>
</div>

@endsection

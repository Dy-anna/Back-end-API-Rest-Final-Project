@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card shadow-sm p-4">
            <h2 class="text-center">🔐 Connexion</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Votre email" required>
                </div>
                <div class="mb-3">
                    <label>Mot de passe</label>
                    <input type="password" name="password" class="form-control" placeholder="Votre mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Se connecter</button>
            </form>

            @if(session('error'))
                <p class="text-danger text-center mt-3">{{ session('error') }}</p>
            @endif
        </div>
    </div>
</div>

@endsection

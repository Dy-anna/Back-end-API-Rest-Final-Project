<?php

use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

// 🔹 Affichage des formulaires de connexion et d'inscription
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::get('/register', function () { return view('auth.register'); })->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 🔹 Gestion des événements (affichage)
Route::get('/events/search', [EventController::class, 'search'])->name('events.search');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create')->middleware('auth');
Route::post('/events', [EventController::class, 'store'])->name('events.store')->middleware('auth');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::post('/events/{id}/register', [EventController::class, 'register'])->middleware('auth')->name('events.register');
Route::post('/events/{id}/favorite', [EventController::class, 'favorite'])->middleware('auth')->name('events.favorite');
Route::get('/favorites', [EventController::class, 'favorites'])->middleware('auth')->name('events.favorites');

Route::middleware('auth')->group(function () {
    Route::get('/my-events', [EventController::class, 'myEvents'])->name('my-events'); // ✅ Voir les événements de l'utilisateur
    Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');  // ✅ Formulaire d'édition
    Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update'); // ✅ Enregistrement des modifications
});

// 🔹 Page de profil de l'utilisateur connecté
Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');

// 🔹 Affichage des événements créés par l'utilisateur
Route::get('/my-events', [EventController::class, 'myEvents'])->name('my-events')->middleware('auth');

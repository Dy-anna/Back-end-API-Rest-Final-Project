<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\EventController;
use Illuminate\Support\Facades\Route;

// 🔹 Authentification API
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// 🔹 Récupération des infos utilisateur (API)
Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'userInfo']);

// 🔹 Recherche d'événements via API
Route::get('/events/search', [EventController::class, 'search']);
Route::get('/events', [EventController::class, 'index']);
Route::get('/events/{slug}/{id}', [EventController::class, 'showBySlug']);

// 🔹 Routes protégées (CRUD et Likes pour les événements)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/events', [EventController::class, 'store']);
    Route::put('/events/{id}', [EventController::class, 'update']);
    Route::delete('/events/{id}', [EventController::class, 'destroy']);
    Route::post('/events/{id}/like', [EventController::class, 'likeEvent']);
});
Route::middleware(['auth:sanctum', EnsureFrontendRequestsAreStateful::class])->group(function () {
    Route::get('/user', [AuthController::class, 'userInfo']);
});
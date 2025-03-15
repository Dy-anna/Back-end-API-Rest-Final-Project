<?php

namespace App\Http\Controllers\API;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class EventController extends Controller
{
    // Liste des événements
    public function index()
    {
        return response()->json(Event::all());
    }

    // Ajouter un événement
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'location' => 'required|string',
            'date' => 'required|date',
            'category' => 'required|string',
            'max_participants' => 'required|integer',
        ]);

        $event = Event::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'location' => $request->location,
            'date' => $request->date,
            'category' => $request->category,
            'max_participants' => $request->max_participants,
        ]);

        return response()->json($event, 201);
    }

    // Voir un événement
    public function show($id)
    {
        $event = Event::find($id);
        if (!$event) {
            return response()->json(['message' => 'Événement introuvable'], 404);
        }
        return response()->json($event);
    }

    // Modifier un événement
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        if (!$event) {
            return response()->json(['message' => 'Événement introuvable'], 404);
        }

        $event->update($request->all());
        return response()->json($event);
    }

    // Supprimer un événement
    public function destroy($id)
    {
        $event = Event::find($id);
        if (!$event) {
            return response()->json(['message' => 'Événement introuvable'], 404);
        }

        $event->delete();
        return response()->json(['message' => 'Événement supprimé']);
    }
}

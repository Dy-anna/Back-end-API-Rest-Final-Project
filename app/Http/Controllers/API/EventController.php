<?php

namespace App\Http\Controllers\API;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    // Liste des événements
    public function index()
    {
        $events = Event::latest()->paginate(5); // Récupère les événements paginés
        return view('events.index', compact('events'));
        return response()->json(Event::all());
    }
    public function showBySlug($slug, $id)
    {
        $event = Event::where('slug', $slug)->where('id', $id)->first();
        if (!$event) {
            return response()->json(['message' => 'Événement non trouvé'], 404);
        }
        return response()->json($event);
    }

    // Ajouter un événement
    

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'location' => 'required|string',
        'date' => 'required|date',
        'category' => 'required|string',
        'max_participants' => 'required|integer|min:1',
    ]);

    // ✅ Ajouter le slug et l'utilisateur connecté
    $validated['slug'] = Str::slug($validated['title']);
    $validated['user_id'] = Auth::id(); // ✅ Associer l'événement à l'utilisateur connecté

    // ✅ Créer l'événement avec les données validées
    Event::create($validated);

    return redirect()->route('home')->with('success', 'Événement créé avec succès.');
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
    $event = Event::findOrFail($id);

    if ($event->user_id !== Auth::id()) {
        return redirect()->route('home')->with('error', 'Vous ne pouvez pas modifier cet événement.');
    }

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'location' => 'required|string',
        'date' => 'required|date',
        'category' => 'required|string',
        'max_participants' => 'required|integer|min:1',
    ]);

    $event->update($validated);

    return redirect()->route('my-events')->with('success', 'Événement mis à jour avec succès.');
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
    public function search(Request $request)
    {
        $query = Event::query();

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        if ($request->has('date')) {
            $query->whereDate('date', $request->date);
        }

        if ($request->has('location')) {
            $query->where('location', 'LIKE', '%' . $request->location . '%');
        }

        return response()->json($query->paginate(5));
    }
    public function create()
{
    return view('events.create');
}

public function edit($id)
{
    $event = Event::findOrFail($id);

    if ($event->user_id !== Auth::id()) {
        return redirect()->route('home')->with('error', 'Vous ne pouvez pas modifier cet événement.');
    }

    return view('events.edit', compact('event'));
}

public function myEvents()
{
    $events = Event::where('user_id', Auth::id())->get(); // ✅ Récupérer uniquement les événements créés par l'utilisateur connecté
    return view('events.my-events', compact('events'));
    
}


}

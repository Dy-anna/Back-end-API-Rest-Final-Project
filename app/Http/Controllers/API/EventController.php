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

    // Ajouter le slug et l'utilisateur connecté
    $validated['slug'] = Str::slug($validated['title']);
    $validated['user_id'] = Auth::id(); // Associer l'événement à l'utilisateur connecté

    // Créer l'événement avec les données validées
    Event::create($validated);

    return redirect()->route('home')->with('success', 'Événement créé avec succès.');
}


    // Voir un événement
    public function show($id)
    {   
        $event = Event::findOrFail($id);
            return view('events.show', compact('event'));

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

    // 🔍 Recherche par mot-clé dans le titre, la description et le lieu
    if (!empty($request->search)) {
        $query->where(function ($q) use ($request) {
            $q->where('title', 'LIKE', '%' . $request->search . '%')
              ->orWhere('description', 'LIKE', '%' . $request->search . '%')
              ->orWhere('location', 'LIKE', '%' . $request->search . '%');
        });
    }

    // 🏆 Filtrer par catégorie (seulement si une catégorie est sélectionnée)
    if (!empty($request->category)) {
        $query->where('category', $request->category);
    }

    // 📅 Filtrer entre deux dates (uniquement si les deux dates sont fournies)
    if (!empty($request->date_start) && !empty($request->date_end)) {
        $query->whereBetween('date', [$request->date_start, $request->date_end]);
    }

    // 🎯 Appliquer la pagination
    $events = $query->paginate(5);

    return view('home', compact('events'));
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
    $user = Auth::user();

    $createdEvents = Event::where('user_id', $user->id)->paginate(5); // ✅ Événements créés
    $registeredEvents = $user->registrations()->paginate(5); // ✅ Événements où il est inscrit

    return view('events.my-events', compact('createdEvents', 'registeredEvents'));
}


public function favorite($id)
{
    $event = Event::findOrFail($id);
    $user = Auth::user();

    if ($user->favorites()->where('event_id', $event->id)->exists()) {
        $user->favorites()->detach($event->id); // Supprimer des favoris
        return redirect()->route('events.show', $event->id)->with('success', 'Événement retiré des favoris.');
    } else {
        $user->favorites()->attach($event->id); // Ajouter aux favoris
        return redirect()->route('events.show', $event->id)->with('success', 'Événement ajouté aux favoris.');
    }
}
public function favorites()
{
    $user = Auth::user();
    $events = $user->favorites()->paginate(5); // ✅ Récupérer les favoris paginés
    return view('events.favorites', compact('events'));
}

public function register($id)
{
    $event = Event::findOrFail($id);
    $user = Auth::user();

    if ($user->registrations()->where('event_id', $event->id)->exists()) {
        // Si déjà inscrit, se désinscrire
        $user->registrations()->detach($event->id);
        $event->increment('max_participants'); // 🔹 Réajoute une place
        return redirect()->route('events.show', $event->id)->with('success', 'Vous vous êtes désinscrit de cet événement.');
    } else {
        // Sinon, s'inscrire
        if ($event->max_participants > 0) {
            $user->registrations()->attach($event->id);
            $event->decrement('max_participants'); // 🔹 Enlève une place
            return redirect()->route('events.show', $event->id)->with('success', 'Vous êtes inscrit à cet événement !');
        } else {
            return redirect()->route('events.show', $event->id)->with('error', 'Plus de places disponibles.');
        }
    }
}



}

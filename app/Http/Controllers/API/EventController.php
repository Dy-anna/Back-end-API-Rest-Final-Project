<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::query();

        if ($request->filled('category')) $query->where('category', $request->category);
        if ($request->filled('location')) $query->where('location', $request->location);
        if ($request->filled('date')) $query->whereDate('date', $request->date);

        return $query->paginate(5);
    }

    public function show($id)
    {
        return Event::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'location' => 'required',
            'date' => 'required|date',
            'category' => 'required',
            'max_participants' => 'required|integer',
        ]);

        $event = new Event($request->all());
        $event->slug = Str::slug($request->title);
        $event->user_id = $request->user()->id;
        $event->save();

        return response()->json($event, 201);
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());

        return response()->json($event);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json(['message' => 'Event deleted']);
    }
}

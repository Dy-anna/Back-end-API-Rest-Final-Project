<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Http\Controllers\Controller;



class HomeController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return view('home', [
            'user' => Auth::user(),
            'events' => $events
        ]);
    }
}


<?php
namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    // Inscription d'un utilisateur
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        // ✅ Rediriger vers login après inscription réussie
        return redirect()->route('login')->with('success', 'Inscription réussie ! Connectez-vous maintenant.');
    }
    

    
    
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // ✅ Rediriger immédiatement vers /home
            return redirect()->route('home');
        }
    
        return redirect()->route('login')->with('error', 'Email ou mot de passe incorrect.');
    }
    
        public function logout()
        {
            Auth::logout();
            return redirect('/login')->with('success', 'Déconnexion réussie.');
        }
    
    

    // Récupérer l'utilisateur connecté
    public function userInfo(Request $request)
    {
        return response()->json($request->user());
    }
}

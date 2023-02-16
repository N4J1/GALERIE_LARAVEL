<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // profile page
    public function index(User $user)
    {
        return view('users.index', [
            'user' => $user
        ]);
    }
    //register view
    public function create()
    {
        return view('users.create');
    }
    // register logic
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => ["required", "min:3"],
            "email" => ["required", "email", Rule::unique('users', 'email')],
            "password" => ["required", "confirmed", "min:6"],
        ]);

        $data["password"] = bcrypt($data["password"]);

        $user = User::create($data);

        auth()->login($user);
        return redirect('/')->with("message", "Compte créé avec succès");
    }

    // login view
    public function login()
    {
        return view('users.login');
    }
    // login logic
    public function authenticate(Request $request)
    {
        $user = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        if (auth()->attempt($user)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Vous avez été connecté !');
        }

        return back()->withErrors(['email' => 'Email ou mot de pass est incorrect']);
    }

    // logout logic
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Vous avez été déconnecté !');
    }
}

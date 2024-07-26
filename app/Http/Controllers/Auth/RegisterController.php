<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view("auth.register");
    }
    public function store(RegisterRequest $request)
    {
        //On récupère les données déjà validées
        $validated = $request->validated();
        //Créer le nouvel utilisateur 
        User::create([
            "name"=> $validated["name"],
            "email"=> $validated["email"],
            "password"=> bcrypt($validated["password"]),
        ]);

        //Connecter directement l'utilisateur
        $user = User::where("email", $validated["email"])->first();
        Auth::login($user);
        //Rediriger l'utilisateur sur la page des articles
        return redirect()->route("articles.index")->with("success","Votre compte a été crée");
    }
}

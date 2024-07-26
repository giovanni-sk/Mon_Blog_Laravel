<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function index(){
        return view("auth.login");
    }

    //Fonction d'authentification

    public function login(Request $request){
        $credentials = $request->validate([
            'email'=> ['required','email'],
            'password'=> ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            // Authentification est passé
            $request->session()->regenerate();
            return redirect()->route('articles.index')->with("success","Connexion réussie");
        }
        return back()->withErrors(['email'=> 'Veuillez entrer un email correcte.',])->onlyInput('email');
    }

    //Fonction de déconnexion

  public function logout(Request $request)
{
    Auth::logout();
    return redirect('/login');
}

}

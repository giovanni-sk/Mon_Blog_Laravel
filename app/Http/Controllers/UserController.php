<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("auth.profil");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            $user->update([
                "name" => $request->name,
                "email" => $request->email
            ]);
        }
        return redirect()->route("profile")->with("success", "Mise a jour reussie");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request ,User $user)
    {
        if (Auth::user()) {
            $user =User::find(Auth::user()->id);
            $user->delete();
            $request->session()->invalidate();
 
            $request->session()->regenerateToken();
         
            return redirect('/login');
        }
    }
}

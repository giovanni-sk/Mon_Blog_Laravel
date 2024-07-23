<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * Affiche toutes les ressources (articles)
     */
    public function index()
    {
        $articles = Article::all();
        return view('layouts.articles',['articles'=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     * Afficher le formulaire de creation d'un article 
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * Stock la resource (l'article) dans la base de donnée 
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * Afficher une resource spécifique
     */
    public function show($id)
    {
        $article = Article::find($id)->with('comments')->first();
        return view('articles.show',['article'=>$article]);
    }

    /**
     * Show the form for editing the specified resource.
     * ici on affiche le formulaire d'édition 
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * Modifier une resource (article) spécifique
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * Supprimer une resource (article) spécifique
     */
    public function destroy(Article $article)
    {
        //
    }
}

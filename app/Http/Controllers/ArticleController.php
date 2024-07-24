<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
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
        // $articles = Article::orderByDesc('created_at')->get();
        $articles = Article::latest()->paginate(2);
        return view('layouts.articles',['articles'=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     * Afficher le formulaire de creation d'un article 
     */
    public function create()
    {
        return view ('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     * Stock la resource (l'article) dans la base de donnée 
     */
    public function store(StoreArticleRequest $request)
    {
     
        $validated = $request->validated(); //on recupère les données valider par le storeArticleRequest  

        //Gerer la sauvegarde de l'image d'il y en a  
        if($request->hasFile('image')){
            $path = $request->file('image')->store('images','public');
            $validated['image']=$path;
        }
// l'utilisateur qui a créer
        $validated['user_id']=1;
        //Envoyer l'article dans la base de donnée
        Article::create($validated);

        // retourne sur la page des articles 

        return redirect('/articles')
        ->with('success' , 'Article créé avec succès !');
    
    }
    /**
     * Display the specified resource.
     * Afficher une resource spécifique
     */
    public function show($id)
    {
        $article = Article::with("comments")->find($id);
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

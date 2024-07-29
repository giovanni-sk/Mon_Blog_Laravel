<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * Affiche toutes les ressources (articles)
     */
    public function index()
    {
        // $articles = Article::orderByDesc('created_at')->get();
        $articles = Article::latest()->paginate(8);
        return view('layouts.articles', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     * Afficher le formulaire de creation d'un article 
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     * Stock la resource (l'article) dans la base de donnée 
     */
    public function store(StoreArticleRequest $request)
    {

        $validated = $request->validated(); //on recupère les données valider par le storeArticleRequest  

        //Gerer la sauvegarde de l'image d'il y en a  
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $validated['image'] = $path;
        }
        // l'utilisateur qui a créer
        $validated['user_id'] = auth()->id();
        //Envoyer l'article dans la base de donnée
        Article::create($validated);

        // retourne sur la page des articles 

        return redirect()->route('articles.index')
            ->with('success', 'Article créé avec succès !');
    }
    /**
     * Display the specified resource.
     * Afficher une resource spécifique
     */
    public function show($id)
    {
        $article = Article::with("comments")->find($id);
        return view('articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     * ici on affiche le formulaire d'édition 
     */
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     * Modifier une resource (article) spécifique
     */
    public function update(UpdateArticleRequest $request, Article  $article)
    {
        // Les données validées sont déjà dfisponinibles
        //via  le updateArticleRequest
        $validated = $request->validated();
        // Gestion de l'image
        if ($request->hasFile('image')) { //si on a une image on supprime l'ancienne et on stock la nouvelle
            //Stocker la nouvelle image
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
                $path = $request->file('image')->store('images', 'public');
                $validated['image'] = $path;
            }
        } else {
            //on garde l'image existante si aucune nouvelle image n'est téléchargée
            $validated['image'] = $article->image;
        }
        //Mettre à jour l'article
        $article->update($validated);

        //Rediriger vers la page de l'article avec un message de cuccès
        return redirect()->route('articles.show',$article->id)->with("success", "Article modifier avec Succès");
    }

    /**
     * Remove the specified resource from storage.
     * Supprimer une resource (article) spécifique
     */
    public function destroy(Article $article)
    {
        // verifions si une image est associés
        if ($article->image) {
            Storage::disk("public")->delete($article->image);
        }
        //Supprimer l'article de la base de donnée et ensuite rediriger vers la liste des articles avec un messages de succès
        $article->delete();
        return redirect()->route("articles.index")->with("success","Article supprimer avec succès");
    }
    //Methode pour effectuer une recherche dans la base de donnée
    public function search (Request $request, Article $article) {
        $query = $request->input('query');
        $articles = Article::where('title','LIKE','%'.$query.'%')->paginate(8);
        return view('articles.search_results',compact('articles'));
    }
}

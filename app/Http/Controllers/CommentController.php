<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        Comment::create([
            "article_id" => $request->article_id,
            "comment" => $request->comment,
            "user_id" => Auth::user()->id,
        ]);
        return redirect()->route("articles.show",  $request->article_id)->with("success", "Commentaire ajouté avec succès");
    }
}

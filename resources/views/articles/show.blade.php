@extends('layouts.master')

@section('contenu')
<article>
    <div class="card mb-5" style="border-style: none;
        box-shadow: 1px 1px 6px #000; font-family:montserrat">
        <img src="{{$article['image'] }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h2 class="card-title">{{ $article["title"]}}</h2>
            <p class="card-text">{{$article["body"]}}</p>
            <p class="card-text"><small class="text-body-secondary">Créer le {{$article->created_at}}</small></p>
            <!-- <a href="#" class="btn btn-primary">Voir plus</a> -->
        </div>
    </div>
</article>
<section class="mb-5">
    <h2><label for="comment-input">Commentaires</label></h2>

    <div>
        @forelse($article->comments as $comment)
            <p>User_id: {{$comment["user_id"]}}</p>
            <p>{{$comment["comment"]}}</p>
            <p>Commenter le {{$comment["created_at"]}}</p>
            @empty
            <p>Aucun commentaire trouvé</p>
            @endforelse
        
    </div>

    <form action="">
        <textarea name="comment" id="comment-input" placeholder="Laissez votre commentaire ici..." class="form-control"></textarea>
        <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
    </form>
</section>
@endsection
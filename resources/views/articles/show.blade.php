@extends('layouts.master')

@section('contenu')
<article>
    <div class="card mb-5" style="border-style: none;
        box-shadow: 1px 1px 6px #000; font-family:montserrat">
        @if($article->image)
        <img src="{{asset('storage/' . $article->image)}}" class="card-img-top" alt="...">
@endif
        <div class="card-body">
            <h2 class="card-title">{{ $article->title}}
                <a href="/articles/{{$article->id}}/edit" class="btn btn-warning ml-3">Editer</a>
                <form method="post" action="{{route('articles.destroy',$article->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </h2>
            <p class="card-text">{{$article->body}}</p>
            <p class="card-text"><small class="text-body-secondary">Créer le {{$article->created_at}} </small> par <strong>{{$article->user->name}}</strong></p>
            
        </div>
    </div>
</article>
<section class="mb-5">
    <h2><label for="comment-input">Commentaires</label></h2>

    <div>
        @forelse($article->comments as $comment)
            <p ><strong class="text-primary">{{$comment->user->name}}</strong>
            <span class="text-bg-dark badge">{{$comment->created_at->diffForHumans()}}</span>
            </p>
            <p>{{$comment->comment}}</p>
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
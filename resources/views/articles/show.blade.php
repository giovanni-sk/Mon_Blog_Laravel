@extends('layouts.master')

@section('contenu')
<article>
    <div class="card mb-5 sm-6" style="border-style: none;
        box-shadow: 1px 1px 6px #000; font-family:montserrat">
        @if($article->image)
        <img src="{{asset('storage/' . $article->image)}}" class="card-img-top" alt="...">
        @endif
        <div class="card-body">
            <h2 class="card-title d-flex ">{{ $article->title}}
               @if($article->user->id==Auth::user()->id)
               <a href="/articles/{{$article->id}}/edit" class="text-warning"><i class="bi bi-pencil-square"></i></a>
                <form method="post" action="{{route('articles.destroy',$article->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="text-danger" type="submit"><i class="bi bi-trash"></i></button>
                </form>

               @endif
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
        <p><strong class="text-primary">{{$comment->user->name}}</strong>
            <span class="text-bg-dark badge">{{$comment->created_at->diffForHumans()}}</span>
        </p>
        <p>{{$comment->comment}}</p>
        @empty
        <p>Aucun commentaire trouvé</p>
        @endforelse

    </div>

    <form action="{{route('comments.create')}}" method="post" >
        @csrf
        <input type="text" name="article_id" hid value="{{$article->id}}">
        <textarea name="comment" id="comment-input" placeholder="Laissez votre commentaire ici..." class="form-control"></textarea>
        <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
    </form>
</section>
@endsection
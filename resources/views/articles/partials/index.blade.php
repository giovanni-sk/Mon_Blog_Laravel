<article>
  <div class="card mb-3" style="border-style: none;
          box-shadow: 1px 1px 6px #000; font-family:montserrat">
    @if($article->image)
    <img src="{{asset('storage/' . $article->image)}}" class="card-img-top" alt="...">
    @endif
    <div class="card-body">
      <h2 class="card-title"><a href="/articles/{{$article['id']}}">{{ $article["title"]}}</a></h2>
      <p class="card-text text-truncate">{{$article["body"]}}</p>
      <p class="card-text"><small class="text-body-secondary">Créer le {{$article->created_at}}</small> par <strong>{{$article->user->name}}</strong></p>
    </div>
  </div>
</article>
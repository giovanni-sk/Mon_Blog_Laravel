<div class="col-sm-12 col-md-3">
  <article>
    <div class="card mb-3 "  style="border-style: none;
          box-shadow: 1px 0.5px 10px #000; font-family:poppins; height:400px;">
      @if($article->image)
      <img src="{{asset('storage/' . $article->image)}}" class="card-img-top" height="200"  alt="...">
      @endif
      <div class="card-body">
        <h2 class="card-title"><a href="/articles/{{$article['id']}}">{{ $article["title"]}}</a></h2>
        <p class="card-text text-truncate">{{$article["body"]}}</p>
        <p class="card-text"><small class="text-body-secondary">Créer le {{$article->created_at}}</small> @if($article->user) par <strong>{{$article->user->name}} @endif</strong></p>
      </div>
    </div>
  </article>
</div>
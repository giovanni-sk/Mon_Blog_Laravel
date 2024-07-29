@extends('layouts.master')
@section('title')
Articles
@endsection
@section('contenu')

<h2>Articles</h2>
@auth
<a href="/articles/create" class="btn btn-primary mb-3">Créer un article</a>
@endauth
@include('articles.partials.searchbar')
<div class="row">
          @forelse($articles as $article)
          @include('articles.partials.index')
          @empty
</div>
@include('articles.partials.no-articles')
@endforelse
<!-- {{-- Liens de pagination --}} -->
<div class="d-flex justify-content-center mx-5">
          {{$articles->links()}}
</div>
@endsection
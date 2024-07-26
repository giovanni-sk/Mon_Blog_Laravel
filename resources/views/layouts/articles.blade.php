@extends('layouts.master')
@section('title')
Articles
@endsection
@section('contenu')

          <h2>Articles</h2>
          @include('articles.search_results')
          @auth
          <a href="/articles/create" class="btn btn-primary mb-3">Créer un article</a>
          @endauth
@forelse($articles as $article)
@include('articles.partials.index')
@empty
@include('articles.partials.no-articles')
@endforelse
<!-- {{-- Liens de pagination --}} -->
<div class="d-flex justify-content-center">
{{$articles->links()}}
 </div>
@endsection



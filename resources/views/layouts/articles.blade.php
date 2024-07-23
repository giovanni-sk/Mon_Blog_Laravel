@extends('layouts.master')
@section('title')
Articles
@endsection
@section('contenu')
          <h2>Articles</h2>
          <a href="/articles/create" class="btn btn-primary mb-3">Créer un article</a>
@forelse($articles as $article)
@include('articles.partials.index')
@empty
@include('articles.partials.no-articles')
@endforelse
@endsection



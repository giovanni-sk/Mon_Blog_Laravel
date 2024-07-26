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
@forelse($articles as $article)
@include('articles.partials.index')
@empty
@include('articles.partials.no-articles')
@endforelse
@if(count($articles)>5)
<div class="d-flex justify-content-center">
    {{$articles->links()}}
</div>
@endif
@endsection
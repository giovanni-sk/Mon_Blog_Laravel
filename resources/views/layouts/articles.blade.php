@extends('layouts.master')
@section('title')
Articles
@endsection
@section('contenu')
          <h2>Articles</h2>
          @if(session('success'))
                    <div class="alert alert-success">
                              {{session('success')}}
                    </div>
          @endif
          <a href="/articles/create" class="btn btn-primary mb-3">Créer un article</a>
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



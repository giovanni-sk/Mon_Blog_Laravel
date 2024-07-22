@extends('layouts.master')
@section('title')
Articles
@endsection
@section('contenu')
    <h2>Articles</h2>
@foreach($articles as $article)
<article>
    <h2>{{ $article["title"]}}</h2>
    <p>{{$article["body"]}}</p>
</article>
@endforeach
@endsection
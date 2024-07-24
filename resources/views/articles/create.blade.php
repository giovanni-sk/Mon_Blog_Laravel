@extends('layouts.master')
@section('title')
Créer un article
@endsection
@section('contenu')
<h2 class="mb-5">Enregistrer un article</h2>
<div class="card p-3 " style="border-style: none;
        box-shadow: 1px 1px 6px #000; font-family:montserrat">
    <form method="POST" action="/articles" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
        <div class="invalid-feedback">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="mb-3">
            <label for="title" class="form-label">
                <h4>Titre de l'article</h4>
            </label>
            <input type="text" class="form-control  @error('title') is-invalid  @enderror  " name="title" id="title" aria-describedby="title" value="{{old('title')}}">
            <!-- {{-- ca c'est le message d'erreur pour le titre --}} -->
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">
                <h4>Corps de l'article</h4>
            </label>
            <textarea  class="form-control   @error('body') is-invalid  @enderror " style="height:15rem;" id="body"  name="body" placeholder="Entrer le corps de votre article">{{old('body')}}</textarea>
            <!-- {{--  ca c'est le message d'erreur pour le body --}} -->
            @error('body')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">
                <h4>Image de l'article</h4>
            </label>
            <input type="file" class="form-control  @error('image') is-invalid  @enderror "  id="image"   name="image" >
            <!-- {{-- ca c'est le message d'erreur pour l'image--}} -->
            @error('image')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
@endsection
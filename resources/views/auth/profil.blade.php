@extends('layouts.master')
@section('title')
Profile
@endsection
@section('contenu')
<h2>Profile</h2>
<div class="row">
    <div class="col">
        <div class="">
            <p>Informations Personnelles</p>
            <small>Mettez à jour votre nom et votre mail</small>
        </div>
    </div>
    <div class="col">
        <div class="card p-5">
            <form action="{{route('profile.update')}}" method="post">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" value="{{old('name', Auth::user()->name)}}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror " id="email" name="email" value="{{old('email', Auth::user()->email)}}" required>
                </div>
                <button class="btn btn-dark" type="submit">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
<div class="row mt-5">
    <div class="col">
        <div class="">
            <p>Informations Personnelles</p>
            <small>Mettez à jour votre nom et votre mail</small>
        </div>
    </div>
    <div class="col">
        <div class="card p-5">
            <p>Si vous  supprimez votre compte vous ne pourrez plus avoir accès mais vos articles resterons toujours publiés...</p>
            <form action="{{route('profile.delete')}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Supprimer mon compte</button>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('layouts.auth')
@section('title','register')
@section('contenu')
<div class="card w-100">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center">Créer son compte</h3>
            <form action="/register" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" value="{{old('name')}}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror " id="email" name="email" value="{{old('email')}}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror " id="password" name="password" value="{{old('password')}}" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmer mot de passe</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror " id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}" required>
                </div>
                <button class="btn btn-primary w-100">Créer le Compte</button>
            </form>
            <p class="mt-3">Vous avez déjà un compte ?
                <a href="{{route('login')}}">Connectez-vous à votre compte</a>
            </p>
        </div>
    </div>
</div>
@endsection
@extends('layouts.auth')
@section('title','register')
@section('contenu')
    <div class="row justify-content-center">
        <div class="col-md-6">
        <h3 class="text-center">Se connecter</h3>
            <form action="{{route('login')}}" method="post">
              
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email"
                     class="form-control @error('email') is-invalid @enderror " 
                     id="email" 
                     value="{{old('email')}}"
                     required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password"
                     class="form-control @error('name') is-invalid @enderror " 
                     id="password" 
                     value="{{old('password')}}"
                     required>
                </div>
                
<button class="btn btn-primary w-100">Connecter</button>
            </form>
            <p class="mt-3">Vous n'avez pas un compte ? 
                <a href="{{route('register')}}">Créer un compte</a>
            </p>
        </div>
    </div>
@endsection

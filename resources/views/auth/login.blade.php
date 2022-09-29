@extends('layouts.base')

@section('title')
    Connexion - @parent
@endsection

@section('sous-title')
    Connexion
@endsection


@section('content')

@error('email')
<p>{{ $message }}</p> 
@endif



<section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form method="post">
            @csrf
  
           
  
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form3Example3" class="form-control form-control-lg"
                placeholder="" name="email" value="{{ old('email') }}" />
              <label class="form-label" for="form3Example3">Email</label>
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" id="form3Example4" class="form-control form-control-lg"
                placeholder="" name="password"  />
              <label class="form-label" for="form3Example4">Mot de passe</label>
            </div>
  
            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" name="remember" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3">
                  Se souvenir de moi
                </label>
              </div>
              <a href="#!" class="text-body">Mot de passe oublié ?</a>
            </div>
  
            <div class="text-center text-lg-start mt-4 pt-2">
              <button class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Se connecter</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Vous n'avez pas de compte ? <a href="{{ route('register') }}"
                  class="link-danger">S'inscrire</a></p>
            </div>
  
          </form>
        </div>
      </div>
    </div>
   
  </section>
@endsection
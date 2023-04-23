@extends('layouts.app')

@section('title')
   HERFATI | LOGIN
@endsection 

@section('style')
<link href="{{asset('assets/css/login/style.css')}}" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
     <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center login">

        <!----------------------- Login Container -------------------------->
    
           <div class="row  rounded-5  bg-white shadow box-area">
    
        <!--------------------------- Left Box ----------------------------->
    
           <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" >
               <div class="featured-image mb-3">
               </div>
               
           </div> 
    
        <!-------------------- ------ Right Box ---------------------------->
            
           <div class="col-md-6 right-box">
              <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2>bonjour</h2>
                            <p>Nous sommes heureux de vous avoir de retour.</p>
                        </div>
                   
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row mb-4">
                                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
    
                            <div class="row mb-4">
                                    <input id="password" type="password" placeholder="Mot de passe" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
    
                            <div class="row mb-4">
                                
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Souviens-toi de moi') }}
                                        </label>
                                    </div>
                                
                            </div>
                            <div class="input-group mb-3 w-100">
                                
                                   
                                        <button type="submit" class=" btn btn-lg btn-primary w-100 fs-6">
                                            {{ __('Se Connecter') }}
                                        </button>
        
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Mot de passe oublié ?') }}
                                            </a>
                                        @endif
                             
                            
                            </div>
    
                            
                            
                        </form>
                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-light w-100 fs-6"><img src="{{asset('assets/images/google.png')}}" style="width:20px" class="me-2"><small>Se connecter avec Google</small></button>
                        </div>
                        <div class="row">
                            <small>Je n'ai pas de compte ?<a href="/register"> S'inscrire </a></small>
                        </div>
                    </div>
              </div>
           </div> 
    
          </div>
        </div>









    
</div>
@endsection

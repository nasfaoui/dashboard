@extends('layouts.app')
@section('title')
    HERFATI | REGISTER
@endsection

@section('style')
<link href="{{asset('assets/css/login/style.css')}}" rel="stylesheet" />
@endsection

@section('content')
 <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center login">

        <!----------------------- register Container -------------------------->
       
           <div class="row  rounded-5 p-3 bg-white shadow box-area">
    
        <!--------------------------- Left Box ----------------------------->
    
           <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box1 " >
               <div class="featured-image mb-3">
               </div>
               
           </div> 
    
        <!-------------------- ------ Right Box ---------------------------->
            
           <div class="col-md-6 right-box">
              <div class="row align-items-center">
                    <div class="header-text mb-4">
                         <h2>S'inscrire maintenant</h2>
                         
                    </div>
                   
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row mb-4">
        
                                    <input id="name" type="text" placeholder="Nom" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            
                            </div>
                            <div class="row mb-4">
        
                                <input id="lastName" type="text" placeholder="Prénom " class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="name" autofocus>

                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                            </div>
                            <div class="row mb-4">
        
                                <input id="telephone" type="text" placeholder="Numéro de téléphone " class="form-control @error('lastName') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="number" autofocus>

                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                            </div>
                            <div class="row mb-4">

                                    <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            
                            </div>
    
                            <div class="row mb-4">
                               
                                    <input id="password" placeholder="Mot de passe" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                              
                            </div>
    
                            <div class="row mb-4">
    
                                    <input id="password-confirm" placeholder="Confirmation du mot de passe" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            
                            </div>
    
                            <div class="row mb-3 ">
                               
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Inscrire') }}
                                    </button>
                              
                            </div>
                            
    
                            
                            
                        </form>
                        <div class="input-group mb-3 w-100">
                            <button class="btn btn-lg btn-light w-100 fs-6"><img src="{{asset('assets/images/google.png')}}" style="width:20px" class="me-2"><small>Se connecter avec Google</small></button>
                        </div>
                        <div class="row">
                            <small>J'ai un compte ? <a href="/login">Se Connecter</a></small>
                        </div>
                    </div>
              </div>
           </div> 
    
          </div>
        </div>
</div>
@endsection

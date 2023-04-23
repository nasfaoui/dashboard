@extends('layouts.app')
@section('title')
    HERFATI | VERIFICATION 
@endsection
@section('style')
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
@endsection

@section('content')
<div class="container d-flex justify-content-center align-items-center login">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-10 rounded-5  bg-white shadow">
               

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                        </div>
                    @endif

                    {{ __('Avant de continuer, veuillez vérifier votre e-mail pour un lien de vérification.') }}
                    {{ __('Si vous n\'avez pas reçu l\'e-mail') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('cliquez ici pour en demander un autre') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

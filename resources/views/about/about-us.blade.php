@extends('layouts.app')


@section('style')
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('assets/css/about/about_style.css')}}" media="screen">

@endsection

@section('title')
   HERFATI | About us
@endsection

@section('content')
  <div class="main_section ">
      <div class="container login">
          <div class="image_sec">
              <img src="{{asset('assets/images/logo.png')}}" alt="logo.png" width="300"  height="300" >
          </div>

          
          <div class="articles shadow p-5 mb-5 bg-white rounded">
              <h3 class="mp-10">Bienvenue sur Hirfati, une plateforme pour acheter et vendre vos services et vos artisanats. </h3>
              <p>Notre objectif est de fournir un site web simple et convivial pour les particuliers et les petites entreprises afin de présenter leurs compétences et leur créativité, et de se connecter avec des clients à la recherche de services de haute qualité et de produits uniques.</p>
              <p>Chez Hirfati, nous croyons en la puissance de la communauté et de la collaboration. Nous encourageons nos vendeurs à partager leurs histoires et leurs expériences, ainsi qu'à fournir des commentaires et un soutien mutuel. Nous valorisons également l'accessibilité et l'abordabilité, et visons à rendre notre plateforme accessible à tous.
                Merci d'avoir choisi Hirfati, et nous espérons vous aider à réussir dans vos entreprises et vos projets créatifs.</p>
          </div>
          

  </div>
@endsection
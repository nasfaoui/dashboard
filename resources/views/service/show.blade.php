
@extends('layouts.app')
@section('title')
  HERFATI | {{$service->title}}
@endsection

@section('style')
<link href="{{asset('assets/css/service/style.css')}}" rel="stylesheet" />
<style>
 

</style>
@endsection

@section('content')
    <div class="container ">
      <div class="contenu ">
      
        <!-- images d'une service -->
        <div class="images my-2 ">
          <div id="carouselExampleIndicators" class="carousel slide">
            
            <div class="carousel-inner">
              @foreach ($images as $image)
                <div class="carousel-item active">
                  <img src="{{asset('storage/'.$image)}}" class="d-block w-100 " alt="...">
                </div>
              @endforeach
            </div>
            <div class="nav_btn">
                <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>

          </div>
          
        </div>
        
        <!-- les infos d'une service -->
        <div class="pb-4 px-4 details d-flex flex-column">
          <h1 class="mt-2">{{$service->title}}</h1>
          <div class="d-flex justify-content-between">
            <h4 class="ville"><i class="fa-solid fa-location-dot me-2"></i>{{$service->location}}</h4>
            <div class="d-flex justify-content-end">
              <div class="nborder me-1">({{$service->Ratings}})</div>
              <div class="rate">
                <i class="fa-solid fa-star" style="color: #FF7F00;"></i>
                <i class="fa-solid fa-star" style="color: #FF7F00;"></i>
                <i class="fa-solid fa-star" style="color: #FF7F00;"></i>
                <i class="fa-solid fa-star-half-stroke" style="color: #FF7F00;"></i>
                <i class="fa-regular fa-star" style="color: #FF7F00;"></i>
              </div>
              
            </div>
          </div>
          <!-- start border -->
          <span class="my-3 border-bottom"></span>
          <!-- end border -->
          <div class="profile d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
              <img src="{{asset('storage/'.$service->user->image)}}" class="icon" alt="" srcset="">
              <div class="ms-3 apropos">
                <div class="username">{{$service->user->name}} {{$service->user->lastName}}</div>
                <a href="" class="compte">Voire le compte</a>
              </div>
            </div>
            
            <a href="" class="  px-50 btn btn-primary"><h6 class="d-none d-xxl-block">Contacter</h6><i class=" fa-solid fa-comment-dots" style="color: #F8F8FF;"></i></a>

           
              
          </div>
          <!-- start border -->
          <span class="my-3 border-bottom"></span>
          <!-- end border -->
          <h3>Description</h3>
          <div class="description py-10 px-4">{{$service->description}}</div>
        </div>

        {{-- avis --}}
        <div class="container bg-white my-3 main-avis">
          <h3 style="border-bottom: 1px solid #ccc;">Avis des acheteurs</h3>

          {{--  --}}
          <div class="avis my-2 ">
            <div class="d-flex align-items-center">
              {{-- image --}}
              <img src="{{asset('storage/'.$service->user->image)}}" class="icon" alt="" srcset="">
              <div class="ms-3 apropos">
                {{-- name --}}
                <div class="username">{{$service->user->name}} {{$service->user->lastName}}</div>
                {{-- time --}}
                <div class="username">{{$service->user->name}}</div>
              </div>
             </div>
              {{-- review --}}
              <div class="review">
                  provident, repellendus laboriosam.provident, repellendus laboriosam.provident, repellendus laboriosam.
              </div>
              <div class="divider "></div>
          </div>
          
           {{--  --}}
           <div class="avis my-2 ">
            <div class="d-flex align-items-center">
              {{-- image --}}
              
              <img src="{{asset('storage/'.$service->user->image)}}" class="icon" alt="" srcset="">
              
              <div class="ms-3 apropos">
                {{-- name --}}
                <div class="username">{{$service->user->name}} {{$service->user->lastName}}</div>
                {{-- time --}}
                <div class="username">{{$service->user->name}}</div>
              </div>
             </div>
              {{-- review --}}
              <div class="review">
                  
                  provident, repellendus laboriosam.provident, repellendus laboriosam.provident, repellendus laboriosam.
              </div>
              <div class="divider "></div>
          </div>
          
        </div>
      </div>

    </div>
  </div>
    
@endsection
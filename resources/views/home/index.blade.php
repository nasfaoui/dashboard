@extends('layouts.app')

@section('title')
    HERFATI  | SERVICES AND GRAFTS MARKETPLACE
@endsection

@section('style')
{{-- owl carousel syle css  --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- live search --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    #scrollButton {
        display: none;
        position: fixed;
        bottom: 10px;
        right: 10px;
        z-index: 999;
    }
</style>

@endsection

@section('script')
{{-- jquery --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- cdn for owl carousel js  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  

{{-- live search --}}
<script src="{{asset('assets/js/dselect.js')}}"></script>

<script>

    // script for slider of service by category 
$('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    dots:false,
    responsive:{
        0:{
            items:1,
            nav:false,
            stagePadding:25,
            center:true,
        },
        600:{
            items:2, 
            nav:false,
        },
        1000:{
            items:4,
            nav:false,
        }
    }
});


   


</script>
@endsection

@section('content')
    {{-- add post for mobile --}}


	
    {{-- start banniére  --}}
    <div class="container d-none  d-lg-block  ">
        <section class="text-center bannier ">
              
        </section>
    </div> 
    {{-- end banniére  --}}
    {{-- start search  --}}
        
    <div class="container  ">
    
           <form action="{{route('search')}}" method="POST" >
                <div class="zone-search text-center shadow-sm p-3 rounded">
                    <div class="row ">
                        <div class=" col d-none d-sm-block ">
                            <div class="input-container">
                                <i class="prefix fa fa-search"></i>
                                <input type="search" class="form-control" name="all" placeholder="Que Recherche vous ?">
                            </div>
                        </div>
                        <div class="col ">
                            <div class="input-container">
                                <i class="prefix fa fa-filter"></i> 
                                <select name="category" class="form-select " id="select_category" data-live-search="true" data-live-search-style="startsWith">                                    <option selected>Choose Categorie</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-container">
                                <i class="prefix fa-solid fa-location-dot"></i>
                                <select name="location" class="form-select" id="select-country" style="align-items: center ; text-align: left;" >
                                    <option value=""> choose Ville </option>
                                </select>

                            </div>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col text-center ">
                            <button type="submit" class="px-10 btn btn-primary" >RECHERCHE AGENT </button>
                        </div>
                    </div>
                </div>
           </form>
      
    </div>
    {{-- end  search  --}}

    {{-- start show pupular service by categories   --}}
    <div class="container ">
            {{-- show products by categories --}}
            @foreach ($categories as $category)
                @if ($category->services_count !=0)
                    <div class="container-fluid   ">
                        <div class="category_title mb-2">
                        <h3>{{$category->category_title}}</h3>
                        </div>
                        <div class="row">
                            <div class="owl-carousel owl-theme">                           
                                @foreach ($category->services as $item)                                   
                                        <div class="item">
                                            <div class="card border-0 shadow-sm p-3 mb-5  rounded" style="width: 17rem;">
                                                <a href="{{route('service.show',$item->title)}}" class="stretched-link">
                                                    {{-- show service image --}}
                                                    @php
                                                            $images = explode(',', $item->images);
                                                            $firstImage = $images[0];
                                                    @endphp
                                                <img src="{{asset('storage/'.$firstImage)}}" class="card-img-top" alt="...">
                                                </a>
                                                <div class="card-body">
                                                <h5 class="card-title">{{$item->title}}{{$item->service_id}}</h5>
                                                <h6 class="">{{$item->user->name}} {{$item->user->lastName}}</h6>
                                                <h6 class=""> à partir de {{$item->price}} $</h6>
                                                    ({{$item->Ratings}}) 
                                                    <i class="ps-2 fa-solid fa-star" style="color: #FF7F00;"></i>
                                                    <i class="fa-solid fa-star" style="color: #FF7F00;"></i>
                                                    <i class="fa-solid fa-star" style="color: #FF7F00;"></i>
                                                    <i class="fa-solid fa-star-half-stroke" style="color: #FF7F00;"></i>
                                                    <i class="fa-regular fa-star" style="color: #FF7F00;"></i>
                                                </div>
                                                
                                            </div>
                                        </div>
                                   

                                    
                                @endforeach

                            </div>
                        </div>
                    
                    </div> 
                @endif
            @endforeach
            

                        


    </div>
    {{-- end  show pupular service by categories --}}
    {{-- lien rapide --}}
    <div class="container  rapide">
        <div class=" mb-2">
            <h4>Recherches rapides</h4>
        </div>
       <div class="rapide_cat">
        @foreach ($categories as $category)
        <a class="rapide_category " href="">{{$category->category_title}}</a>
        @endforeach
       </div>
    </div>
@endsection
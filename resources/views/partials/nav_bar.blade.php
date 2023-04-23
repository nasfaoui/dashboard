
{{-- nav bar  --}}


<nav class="navbar navbar-expand-lg  sticky-top shadow-sm   " data-navbar-on-scroll="data-navbar-on-scroll">
  <div class="container">
    {{-- profile for mobile   --}}
    <button class="btn  d-block d-sm-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fa fa-user"></i></button>
    <div class="d-block d-sm-none  offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">
           <img src="{{asset('assets/images/logo.png')}}" alt="logo" height="60" width="70" >
          
        </h5>
        <button type="button " class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body ">
        <!-- Authentication Links -->
        @guest
          @if (Route::has('login'))
            <a class="btn btn-secondary-outline rounded border w-100 " href="/login">SE CONNECTER</a>
            @auth
                <a class="btn btn-primary  mt-10 w-100" href="/post"><i class="fa fa-add"></i> DEPOSER VOTRE TRAVAIL</a>
            @endauth

            @endif
          @else
            <div class="col">
                <img src="{{asset('storage/profile/'.Auth::user()->image )}}" width="30" class="user-image" height="30" class=" " alt="" srcset="">
                <div class="user-name">
                 {{ Auth::user()->name }} {{ Auth::user()->lastName }}
               </div>
                <ul class="list-group list-group-flush">
                    @if (Auth::user()->isArtisan)
                    <li class="list-group-item"><a class="dropdown-item" href="/"><i class="fa fa-rectangle-ad mr-5"> </i>  Annonces</a></li>
                    @else
                    <li class="list-group-item"><a class="dropdown-item" href="{{ route('to_artisan') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('to_artisan').submit();"><i class="fa-light fa-repeat"></i>
                        {{ __('passer à saller') }}
                    </a></li>
                    @endif
                    <li class="list-group-item"> <a class="dropdown-item" href="/"><i class="fa fa-heart"> </i> Favorite</a></li>
                    <li class="list-group-item"><a class="dropdown-item" href="/"><i class="fa fa-gear"> </i>  Parameter</a></li>
                    <li class="list-group-item"><a class="dropdown-item" href="/about"><i class="fa-solid fa-circle-info"></i> à propose nous</a></li>
                    <li class="list-group-item"><a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fa fa-right-from-bracket"> </i> 
                      {{ __('Déconnecter') }}
                    </a></li>
                  
                  </ul>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form> 
            </div>
        @endguest
      </div>
    </div>
    {{-- end  profile   --}}
 

 
    {{-- logo --}}
    <a class="navbar-brand " href="/">
      <img src="{{asset('assets/images/logo.png')}}" alt="logo.png" width="70" height="60">
      <span class="d-none d-lg-inline-block align-middle ">HIRFATI</span>
    </a>

    
    {{-- end  logo   --}}

    {{-- start filtter   --}}
    <button class="d-block d-sm-none  btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-magnifying-glass"></i></button>
    <div class="d-block d-sm-none  offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <h5 class="offcanvas-title" id="offcanvasRightLabel"> FILLT</h5>
      </div>
      <div class="offcanvas-body ">
          <div class="row filtter">
            <div class=" col-md-6 mb-10 ">
                <input type="search" class="form-control" placeholder="search all">
            </div>
            <div class="col-sm-6 col-md-6 mb-10  col-lg-4">
                <input type="search" class="form-control " placeholder="search categories">
            </div>
            <div class="col-sm-6 col-md-6 mb-10 col-lg-4  ">
                <div class="form-group">
                    <select id="country-select" class="form-control">
                        <option value="">Select a country</option>
                        <option value="casablanca">Casablanca</option>
                        <option value="rabat">Rabat</option>
                        <option value="marrakech">Marrakech</option>
                        <option value="fez">Fez</option>
                        <option value="tangier">Tangier</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mt-3 ">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary">RECHERCHE AGENT </button>
            </div>
        </div>
      </div>
    </div>
    {{-- end  filtter   --}}


    {{-- profile for web   --}}
      
    <button class="d-none  navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa-solid fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <!-- Authentication Links -->
           @guest
            
            <a class="btn btn-secondary-outline rounded border " href="/login">SE CONNECTER</a>
            <a class="btn btn-secondary ms-2 rounded border " href="/register">INSCRIPTION</a>
            @endguest
            @auth
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <img src="{{asset('storage/'.Auth::user()->image )}}" width="30" class="align-center me-2 user_img_web" height="30" class=" " alt="" srcset="">
                  {{ Auth::user()->name }} 
                </a>
                

                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                    @if (Auth::user()->isArtisan)
                    <a class="dropdown-item" href="/"><i class="fa fa-rectangle-ad mr-5"> </i>  Annonces</a>
                    @else
                    <a class="dropdown-item" href="{{ route('to_artisan') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('to_artisan').submit();"><i class="fa-light fa-repeat"></i>
                        {{ __('passer à saller') }}
                    </a>
                    @endif
                    <a class="dropdown-item" href="/"><i class="fa fa-heart"> </i> Favorite</a>
                    <a class="dropdown-item" href="/dashbord"><i class="fa fa-gear"> </i>  Dashbord</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fa-thin fa-repeat"></i> 
                        {{ __('Déconnecter') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>

                    {{-- switch to saller --}}
                    <form id="to_artisan" action="{{ route('to_artisan') }}" method="POST" class="d-none">
                      @csrf
                    </form>

                </div>
            </li>
            {{-- test  --}}
            @if (Auth::user()->isArtisan)
              <a class="btn btn-primary ms-3 mb-10 d-none d-md-block depose align-text-bottom "  href="/post"><i class="ms-2 me-3 fa fa-add"></i> DEPOSER VOTRE TRAVAILLE</a>
            @endif
            @endauth
           
        
          
            
       
    </ul>
    </div>



  </div>
</nav>

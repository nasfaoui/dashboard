<div class="container">
    <div class="tab-pane row fade bg-white mb-5 rounded p-5  "  id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                @if (session()->has('message'))
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                      {{session('message')}}
                    </div>
                  </div>
                @endif
                @if ($services->count()==0)
                    <div class="container d-flex align-items-center justify-content-center ">
                        <p class="">aucun service</p>
                    </div>
                @else
                @foreach ($services  as $service)
                <div class="  shadow-sm  p-3 mt-3 mb-3 rounded   w-100   "  >
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="flex-shrink-0">
                            @php
                                $images = explode(',', $service->images);
                                $firstImage = $images[0];
                            @endphp
                            <img src="{{asset('storage/'.$firstImage)}}" class=" rounded-start   "  height="180" width="180" alt="...">
                        </div>
                        <div class="flex-grow-1 mx-3 w-50 ">
                            <h2 class="card-title">{{$service->title}}</h2>
                            <p class="card-text">{{$service->description}}</p>
                            <h4 class="card-text overflow-hidden">crée le : {{$service->created_at}}</h4>
                        </div>
                        <div class="flex-shrink-0 " >
                            <a href="{{route('service.edit',$service)}}" class="btn btn-success align-item-center col " >Modifier</a>
                            <button wire:click="delete({{$service}})" class="btn btn-danger align-item-center col ">Supprimer</button>

                        </div>
                    </div>
                </div>
             
                @endforeach
                <a class="btn btn-primary w-25  mt-10 mx-auto" href="{{route('service.post')}}"> DEPOSER VOTRE TRAVAIL</a>
            @endif
        
</div>
</div>
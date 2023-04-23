@extends('admin.index')

@section('contentD')

    <h4 class="">Services</h4>
{{-- @dd($service) --}}
@foreach ($service as $object)
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="{{$object->images}}" class="card-img-top" alt="qsdqsd">
      <div class="card-body">
        <h5 class="card-title"> title : {{$object->title}}</h5>
        <p class="card-text"> description : {{$object->description}}</p>
        <p class="card-text"> location : {{$object->location}}</p>
        <p class="card-text"> price : {{$object->price}}</p>
        <p class="card-text"> category : {{$object->category_title}}</p>
        <p class="card-text">
          avis : 
        </p>
      </div>
      <div class="card-footer">
        <small class="text-muted"> {{$object->created_at}} </small>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection

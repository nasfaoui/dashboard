@extends('layouts.app')

@section('title')
    HERFATI  | UPDATE SERVICE
@endsection

@section('style')
    <style>
    </style>
@endsection

@section('script')

@endsection

@section('content')
    <div class="container  ">
        <div class="row mt-1">
            <div class="col text-center ">
                <h3>Modifier l' ANNONCE</h3>
            </div>
        </div>
        
        @livewire('edit-component' , ['service'=>$service ,'categories'=>$categories] )
    </div>
@endsection

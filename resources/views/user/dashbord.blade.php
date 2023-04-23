@extends('layouts.app')
@section('title')
    HIRFATI | DASHBORD 
@endsection

@section('content')
    <div class="container  mt-2">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button"
                    role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-cog"></i>
                    Parametre</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                    type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i
                        class="fas fa-bullhorn"></i> Mes Annonces</button>
            </div>
        </nav>
                {{-- component for updating user info  --}}
                {{-- @livewire('dashbord-component') --}}
                <livewire:dashbord-component />
                {{-- component for showing user services or annonces   --}}
                <livewire:user-annonce-component />
                {{-- @livewire('user-annonce-component') --}}
    </div>
@endsection

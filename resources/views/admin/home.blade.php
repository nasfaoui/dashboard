@extends('admin.index')

@section('contentD')
    <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

    <div class="row">
        <div class="col-xl-6 col-xxl-5 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Services</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="grid"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $services }}</h1>
                                <div class="mb-0">

                                    @if ($previousWeekServices > $currentWeekServices)
                                        <span class="text-danger fw-bold"> <i class="mdi mdi-arrow-bottom-right"></i>
                                            -{{ $percentageChange }}% </span>
                                    @else
                                        <span class="text-success fw-bold"> <i class="mdi mdi-arrow-bottom-right"></i>
                                            +{{ $percentageChange }}% </span>
                                    @endif


                                    <span class="text-muted">Since last week</span>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Users</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $users }}</h1>
                                <div class="mb-0">
                                    @if ($previousWeekusers > $currentWeekusers)
                                        <span class="text-danger fw-bold"> <i
                                                class="mdi mdi-arrow-bottom-right"></i>-{{ $percentageChangeU }} %</span>
                                    @else
                                        <span class="text-success fw-bold"> <i
                                                class="mdi mdi-arrow-bottom-right"></i>+{{ $percentageChangeU }} %</span>
                                    @endif
                                    <span class="text-muted">Since last week</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title">Commandes</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="shopping-cart"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">{{ $commands }}</h1>
                                <div class="mb-0 ">
                                    @if ($previousWeekC > $currentWeekC)
                                        <span class="text-danger fw-bold"> <i
                                                class="mdi mdi-arrow-bottom-right"></i>-{{ $percentageChangeC }} %</span>
                                    @else
                                        <span class="text-success fw-bold"> <i
                                                class="mdi mdi-arrow-bottom-right"></i>+{{ $percentageChangeC }} %</span>
                                    @endif
                                    <span class="text-muted">Since last week</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="d-flex justify-content-evenly">

                <div class="card w-full w-100 m-2 p-3 rounded-3">
                    <div class="col mt-0 mb-3">
                        <h5 class="card-title">LES 5 VILLE POPULAIRES</h5>
                    </div>
                    <div>
                        @foreach ($top_cities as $city)
                            <div>
                                <span class="fw-bold"><i class="align-middle me-2   text-primary"
                                        data-feather="map-pin"></i>{{ $city->ville }}: {{ $city->total }}</span>
                                        <hr>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="card w-full w-100 m-2 p-3 rounded-3">
                    <div class="bg-white w-full w-100 m-2  rounded-3">
                        <div class="col mt-0 mb-3">
                            <h5 class="card-title">LES 5 CATEGORIES POPULAIRES</h5>
                        </div>
                        <div>
                            @foreach ($top_categories as $category)
                                <div>
                                    <span class="fw-bold"><i class="align-middle me-2 text-primary strong"
                                     data-feather="package"></i>{{ $category->category_title }}: {{ $category->total }}</span>
                                        <hr>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
@endsection

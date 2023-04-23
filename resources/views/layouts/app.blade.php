<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}">
    <title>@yield('title')</title>

    <!-- style -->
    <link rel="stylesheet" href="{{asset('assets\css\bootstrap.min.css')}}">
    <link href="{{asset('assets\css\bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    {{-- livewire style --}}
    @livewireStyles
    {{-- costum styles --}}
    @yield('style')
</head>
<body>
    <!-- header -->
    @include('partials.nav_bar')
    <!-- content -->
    @yield('content')
    <!-- footer -->
    @include('partials.footer')
    
   

    <!-- script js  -->
    <script src="{{asset('assets/js/jquery-3.6.4.js')}}"></script>
    @yield('script')
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/8969832da8.js" crossorigin="anonymous"></script>
    {{-- livewire scripts --}}
    @livewireScripts
</body>
</html>
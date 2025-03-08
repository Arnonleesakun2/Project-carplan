{{-- หน้าจัดการLayout --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @yield('script')
    @vite('resources/css/app.css')
    
    {{--fontawesome--}}
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}">
    {{--jquery--}}
     <script type="text/javascript" src="{{ asset('jquery/jquery.js') }}"></script>
    {{--signature--}}
        <script type="text/javascript" src="{{asset('signaturec/signature2.js')}}"></script>
        <script type="text/javascript" src="{{asset('signaturec/signature.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="{{asset('signaturec/signature.css')}}">
    {{--datatabel--}}
        <link rel="stylesheet" type="text/css" href="{{asset('datatable/style1.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('datatable/style2.css')}}"/>
        <script type="text/javascript" src="{{asset('datatable/script1.js')}}"></script>
        <script type="text/javascript" src="{{asset('datatable/script2.js')}}"></script>
    {{--sweetalert--}}
        <script src="{{ asset('sweetalert/1.js') }}"></script>
    {{--select2--}}    
    <script src="{{ asset('select2/select2.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('select2/select2.css')}}"/>

</head>
<body>
    <div class="">
        @if(Auth::check())
            @if(Auth::user()->type == 'admin')
                @include('layout/Navbar/AdminSidebar/Sidebar')
            @elseif(Auth::user()->type == 'user')
                @include('layout/Navbar/UserSidebar/Sidebar')
            @elseif(Auth::user()->type == 'planner')
                @include('layout/Navbar/PlannerNavbar/Navbar')
            @endif 
        @else     
            <div>
                @yield('content')
            </div>        
        @endif
    </div>
</body>
</html>


@extends('layout/Navbar/Navbar')
@section('title')
    AdminDashboard
@endsection
@section('content')
    @if (Session::has('error'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
        }
        toastr.error("{{ Session::get('error') }}", 'Error!', {
            timeOut: 3000
        });
    </script>
    @endif
@endsection
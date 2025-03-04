@extends('layout/Navbar/Navbar')
@section('title')
    ข้อมูล
@endsection
@section('content')
    @include('planner.carplanners.editcarplans.editcarplan'){{-- EditCarplanTable --}}
    <script>
        var baskets = @json($baskets); // ส่งค่าไปยัง JavaScript
    </script>
    <script src="{{ asset('scripts/planner/edit.js') }}"></script>
@endsection

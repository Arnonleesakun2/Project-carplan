@extends('layout/Navbar/Navbar')
@section('title')
    วางแผนเดินรถ
@endsection
@section('content')
    @if (session('message'))
        <script>
            Swal.fire({
                title: 'สำเร็จ!',
                text: "{{ session('message') }}",
                icon: 'success',
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire({
                title: 'ผิดพลาด!',
                text: "{{ session('error') }}",
                icon: 'error',
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    @endif
    @include('planner.carplanners.carplans.carplan'){{-- CarplanTable --}}
    <script src="{{ asset('scripts/planner/carplan.js') }}"></script>
    <script src="{{ asset('scripts/planner/select.js') }}"></script>
    <script>
        var baskets = @json($baskets); // ส่งค่าไปยัง JavaScript
    </script>
@endsection


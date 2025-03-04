{{-- ฟอร์มกรอกของมูล พนักงานใหม่ --}}
@extends('layout/Navbar/Navbar')
@section('title')
    สมัครสมาชิก
@endsection
@section('content')
    @if (Session::has('message'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.success("{{ Session::get('message') }}", 'Success!', {
                timeOut: 3000
            });
        </script>
    @endif
    <div class="w-[90%]  mx-auto text-[20px]  text-text">
        <p class="px-2">สมัครงาน</p>
    </div>
    <div
        class="rounded-[5px] max-w-[90%] my-[10px]  mx-auto ">
        @include('home/newregisterfrom/from')
    </div>
@endsection

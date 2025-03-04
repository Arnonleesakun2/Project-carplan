{{-- เพิมพนักงานใหม่เข้าบริษัท --}}
@extends('layout/Navbar/Navbar')
@section('title')
    เพิ่มพนักงานเข้าบริษัท
@endsection
@section('content')
        <div class="w-[97%]  mx-auto text-[20px] py-[3px] text-text">
            <p>เพิ่มพนักงานเข้าบริษัท</p>
        </div>
        <div
            class="rounded-[5px] max-w-[97%] my-[10px] p-[30px] mx-auto shadow-[1px_2px_6px_rgba(0,0,0,0.38)] border-solid border-[1px] border-[#DFDFDF]">
            @include('admin/waitingemployees/addmemberform/addmemberform')
        </div>
@endsection

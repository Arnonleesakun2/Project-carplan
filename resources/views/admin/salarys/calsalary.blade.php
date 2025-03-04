{{-- แก้ไขเงินเดือน --}}
@extends('layout/Navbar/Navbar')
@section('title')
    แก้ไขเงินเดือนบริษัทตาตง
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
    <div class="w-[97%]  mx-auto text-[20px] py-[3px] text-text">
        <p>แก้ไขเงินเดือน</p>
    </div>
    <div
        class="rounded-[5px] max-w-[97%] my-[10px] p-[30px] mx-auto shadow-[1px_2px_6px_rgba(0,0,0,0.38)] border-solid border-[1px] border-[#DFDFDF]">
        @include('admin/salarys/calsalaryform/calsalaryform')
    </div>
@endsection
@section('endscript')
    <script>
        $(document).ready(function() {
            $('#btn-cal').on('click', cal)
            function cal() {
                let total = (Number($('#salary').val())) +
                    (Number($('#bonus').val())) -
                    (Number($('#missingwork').val())) -
                    (Number($('#lostproduct').val())) -
                    (Number($('#poicefine').val())) -
                    (Number($('#transportfine').val())) -
                    (Number($('#welfareloan').val())) -
                    (Number($('#ava').val())) -
                    (Number($('#drivinginsurance').val())) +
                    (Number($('#storefront').val()))
                $('#total').val(total);
                $('.total').val(total);
                $('.salary').val();
            }
        })
    </script>
@endsection

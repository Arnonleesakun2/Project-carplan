{{-- แสดงปฏิทิน --}}
@extends('layout/Navbar/Navbar')
@section('title')
    เพิ่มข้อมูล
@endsection
@section('script')
    <style>
        label {
            display: block;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
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
        <p>เพิ่มข้อมูล</p>
    </div>
    <div
        class="rounded-[5px] max-w-[97%] my-[10px] p-[30px] mx-auto shadow-[1px_2px_6px_rgba(0,0,0,0.38)] border-solid border-[1px] border-[#DFDFDF]">
        <form class="w-full max-w-[500px] mx-auto" action="{{ URL('/CreateSchedule') }}" method="POST">
            @csrf
            <label for='title'>{{ __('หัวข้อ') }}</label>
            <input type='text' class='input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]'
                id='title' name='title'required>
            @error('title')
                <div class="invalid-feedback d-block text-red-700">{{ $errors->first('title') }}</div>
            @enderror
            <label for="start">{{ __('วันที่') }}</label>
            <input type='date' class='input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]'
                id='start' name='start' required value='{{ now()->toDateString() }}'required>
            @error('start')
                <div class="invalid-feedback d-block text-red-700">{{ $errors->first('start') }}</div>
            @enderror
            <label for="end">{{ __('ถึงวันที่') }}</label>
            <input type='date' class='input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]'
                id='end' name='end' required value='{{ now()->toDateString() }}'required>
            @error('end')
                <div class="invalid-feedback d-block text-red-700">{{ $errors->first('end') }}</div>
            @enderror
            <label for="description">{{ __('รายละเอียด') }}</label>
            <textarea id="description" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                name="description"></textarea>
            @error('description')
                <div class="invalid-feedback d-block text-red-700">{{ $errors->first('description') }}</div>
            @enderror
            <label for="color">{{ __('Color') }}</label>
            <input type="color" id="color" name="color"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" required/>
            <div class=" mt-10 w-11/12 mx-auto mb-8">
                <div class=" text-center">
                    <div >
                        <button type="submit" class="py-[7px] px-[21px]  bg-[#111827] text-white cursor-pointer rounded-[10px] hover:bg-[#374151] duration-300">บันทึก</button>
                        <a class="py-[7px] px-[21px] bg-[#FF5861] text-white rounded-[10px] hover:bg-[#EF4C53] duration-300"
                            href="{{ url('/FullCalender') }}">ยกเลิก</a>
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>
@endsection

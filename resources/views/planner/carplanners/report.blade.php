@extends('layout/Navbar/Navbar')
@section('title')
    รายงานแพนรถ
@endsection
@section('content')
    @if (Session::has('message'))
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
    <div class="w-[90%] mx-auto space-y-[40px] py-[50px]">
        <div class="p-8 rounded-lg bg-white space-y-4 shadow-custom min-h-[500px]">
            <div class="overflow-x-auto">
                <table id="my_table" class="nowrap table text-center w-full ">
                    <thead>
                        <tr class="">
                            <th>ลูกค้า</th>
                            <th>ว/ด/ป</th>
                            <th>เส้นทาง</th>
                            <th>เวลา</th>
                            <th>เบอร์รถ</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                            <th>ออกรายงาน</th>
                            <th>PDFFILE</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($carplans as $carplan)
                            <tr>
                                <th>{{ $carplan->customers->customer }}</th>
                                <th>{{ \Carbon\Carbon::parse($carplan->date)->format('d/m/Y') }}</th>
                                <!-- แปลงวัน/เดือน/ปี -->
                                <th>{{ $carplan->roads->road ?? '' }}</th>
                                <th>{{ \Carbon\Carbon::parse($carplan->roads->time ?? '')->format('H:i') }}</th>
                                <th>{{ $carplan->cars->number }}</th>
                                <th><a href="{{ url('/EditPlanner', $carplan->id) }}"><i
                                            class="fa-solid fa-pen-to-square hover:scale-110 duration-700"></i></a>
                                </th>
                                <th><a href="{{ url('/DeletePlanner', $carplan->id) }}"><i
                                            class="fa-solid fa-trash hover:scale-110 duration-700"></i></a></th>
                                <th><a target="_blank" href="{{ url('/PrintPlanner', $carplan->id) }}"><i
                                            class="fa-solid fa-arrow-right-to-bracket hover:scale-125 duration-700"></i></a>
                                </th>
                                <th><a target="_blank" href="{{ url('/PrintPlannerPdf', $carplan->id) }}"><i
                                            class="fa-solid fa-file-pdf hover:scale-125 duration-700"></i></a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script src="{{ asset('scripts/planner/report.js') }}"></script>
@endsection


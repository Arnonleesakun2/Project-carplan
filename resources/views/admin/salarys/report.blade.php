{{-- รายงานเงิน --}}
@extends('layout/Navbar/Navbar')
@section('title')
    รายงานเงินเดือน
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
    @if (Session::has('error'))
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
        <p>รายงานเงินเดือนบริษัทตาตง</p>
    </div>
    <div
        class="rounded-[5px] max-w-[97%] my-[10px] p-[30px] mx-auto shadow-[1px_2px_6px_rgba(0,0,0,0.38)] border-solid border-[1px] border-[#DFDFDF]">
        <div class="justify-end  mb-2 flex item-center">
            <div class="button flex ">
                <a class="py-[7px] px-[21px] bg-[#FF5861] text-white rounded-[10px] hover:bg-[#EF4C53] duration-300"
                    href="{{ url('/Employees') }}">ยกเลิก</a>
            </div>
        </div>
        <div class="tatongtable">
            <div class="">
                <table id="myTable" class="nowrap table text-center w-full">
                    <thead>
                        <tr>
                            <th>ชื่อ-นามสกุล</th>
                            <th>ตำแหน่ง</th>
                            <th>เงินเดือน</th>
                            <th>วันที่ออกเงินเดือน</th>
                            <th>เบี้ยขยัน</th>
                            <th>ขาดงาน</th>
                            <th>สินค้าหาย</th>
                            <th>ค่าปรับตร</th>
                            <th>ค่าปรับขนส่ง</th>
                            <th>สวัสดิการ</br>ยืมเงิน</th>
                            <th>กยศ</th>
                            <th>เงินเดือน</br>(ประกันการขับขี่)</th>
                            <th>หน้าร้าน</br>(ประกันการขับขี่)</th>
                            <th>เงินเดือนรวม</th>
                            <th>คลิกเพิ่มลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                            <tr>
                                <th>{{ $report->employees->name }}</th>
                                <th>{{ $report->employees->positions->name }}</th>
                                <th>{{ $report->employees->salarys[0]->name }}</th>
                                <th>{{ $report->datecal }}</th>
                                <th>{{ $report->bonus }}</th>
                                <th>{{ $report->missingwork }}</th>
                                <th>{{ $report->lostproduct }}</th>
                                <th>{{ $report->poicefine }}</th>
                                <th>{{ $report->transportfine }}</th>
                                <th>{{ $report->welfareloan }}</th>
                                <th>{{ $report->ava }}</th>
                                <th>{{ $report->drivinginsurance }}</th>
                                <th>{{ $report->storefront }}</th>
                                <th>{{ $report->total }}</th>
                                <th><a class="fa-solid fa-trash fa-xl" href="{{ url('/DeleteSalary', $report->id) }}"></a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                    <tbody class="SelectMonth" id="SelectMonth"></tbody>
                    <tbody class="SelectYear" id="SelectYear"></tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
@section('endscript')
    <script>
        //month
        $(document).ready(function() {

            $('#myTable').DataTable({
                responsive: true,
                autoWidth: false, // ปิดการตั้งค่า Auto Width
                columnDefs: [{
                        width: '20%',
                        targets: 0
                    }, // กำหนดความกว้างของคอลัมน์
                ],
                language: {
                    paginate: {
                        previous: 'ก่อนหน้า',
                        next: 'ถัดไป'
                    },
                    info: 'แสดง _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ',
                    infoEmpty: 'ไม่มีข้อมูล',
                    emptyTable: 'ไม่มีข้อมูลในตาราง',
                    lengthMenu: 'แสดง _MENU_ รายการต่อหน้า',
                }
            });
        });
    </script>
@endsection

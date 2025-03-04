{{-- หน้าแสดงของมูลผู้สมัครและรออนุมัติ --}}
@extends('layout/Navbar/Navbar')
@section('title')
    รอสัมภาษณ์
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
        <p>พนักงานรอสัมภาษณ์</p>
    </div>
    <div
        class="rounded-[5px] max-w-[97%] my-[10px] p-[30px] mx-auto shadow-[1px_2px_6px_rgba(0,0,0,0.38)] border-solid border-[1px] border-[#DFDFDF]">
        <div class="overflow-auto">
            <table id="myTable"class="nowrap table text-center w-full">
                <thead>
                    <tr class="">
                        <th>ชื่อ</th>
                        <th>ชื่อเล่น</th>
                        <th>เบอร์โทร</th>
                        <th>กำหนดงาน</th>
                        <th>ข้อมูล</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr class="hover items-center text-center">
                            <th>{{ $employee->name }}</th>
                            <th>{{ $employee->nickname }}</th>
                            <th>{{ $employee->tel }}</th>
                            <th><a class="fa-solid fa-paperclip fa-xl hover:scale-110 duration-500"
                                    href="{{ url('/NewAdd', $employee->id) }}"></a></th>
                            <th><a class="fa-solid fa-file-excel fa-xl hover:scale-110 duration-500"
                                    href="{{ url('/ShowFirst', $employee->id) }}"></a></th>
                            <th><a class="fa-solid fa-pen-to-square fa-xl hover:scale-110 duration-500"
                                    href="{{ url('/NewEdit', $employee->id) }}"></a></th>
                            <th><a class="fa-solid fa-trash-can fa-xl hover:scale-110 duration-500"
                                    href="{{ url('/NewDelete', $employee->id) }}"></a></th>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
@section('endscript')
    <script>
        $(document).ready(function() {
            //datatable
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

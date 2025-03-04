{{-- รายชื่อพนักงานที่พ้นสภาพ --}}
@extends('layout/Navbar/Navbar')
@section('title')
    พนักงานที่พ้นสภาพ
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
        <p>พนักงานพ้นสภาพ</p>
    </div>
    <div
        class="rounded-[5px] max-w-[97%] my-[10px] p-[30px] mx-auto shadow-[1px_2px_6px_rgba(0,0,0,0.38)] border-solid border-[1px] border-[#DFDFDF]">
        <div class="con-table mt-4 overflow-auto pt-14">
            <table id="myTable" class="nowrap table text-center w-full">
                <thead>
                    <tr class="">
                        <th>ชื่อ</th>
                        <th>บริษัท</th>
                        <th>ตำแหน่ง</th>
                        <th>หน้าที่</th>
                        <th>สถานะ</th>
                        <th>tool</th>
                    </tr>
                </thead>
                <tbody class="alldata text-center">
                    @foreach ($employees as $employee)
                        <tr class="hover">
                            <th>{{ $employee->name }}</th>
                            <th>{{ $employee->companys->name }}</th>
                            <th>{{ $employee->positions->name }}</th>
                            <th>{{ $employee->mainlines->name }}</th>
                            <th>{{ $employee->outsts->name }}</th>
                            <th>
                                <div class="dropdown dropdown-top dropdown-end ">
                                    <div tabindex="0" role="button"
                                        class="manu fa-solid fa-ellipsis fa-xl hover:scale-110 duration-500">
                                    </div>
                                    <ul tabindex="0"
                                        class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-44">
                                        <li><a href="{{ url('/BackOut', $employee->id) }}"
                                                class="fa-solid fa-arrow-right-arrow-left hover:scale-110 duration-500">&nbsp;&nbsp;เข้าบริษัท</a>
                                        </li>
                                        <li><a class="fa-solid fa-file-excel hover:scale-110 duration-500"
                                                href="{{ url('/OutInfo', $employee->id) }}">&nbsp;&nbsp;ข้อมูล</a>
                                        </li>
                                        <li><a class="fa-solid fa-pen-to-square hover:scale-110 duration-500"
                                                href="{{ url('/OutEdit', $employee->id) }}">&nbsp;&nbsp;แก้ไข</a>
                                        </li>
                                        <li><a class="fa-solid fa-trash hover:scale-110 duration-500"
                                                href="{{ url('/OutDelete', $employee->id) }}">&nbsp;&nbsp;ลบ</a>
                                        </li>
                                    </ul>
                                </div>
                            </th>
                        </tr>
                    @endforeach

                </tbody>
                <tbody class="SelectOut" id="selectdata"></tbody>
            </table>

        </div>
    </div>
@endsection
@section('endscript')
    <script>
        //เลือกพนักงาน
        $(document).ready(function() {
            $('#selectoutdata').click(function() {
                $value = $(this).val();
                if ($value) {
                    $('.alldata').hide()
                    $('.SelectOut').show()
                } else {
                    $('.alldata').show()
                    $('.SelectOut').hide()
                }
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('SelectOutdata') }}',
                    data: {
                        'selectout': $value
                    },
                    success: function(data) {
                        $('#selectdata').html(data);
                    }
                });
            })
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

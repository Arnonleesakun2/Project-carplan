{{-- หน้าการอบรม --}}
@extends('layout/Navbar/Navbar')
@section('title')
    ประชุม/อบรม
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
    @if (session('warning'))
        <script>
            Swal.fire({
                title: 'ผิดพลาด!',
                text: "{{ session('warning') }}",
                icon: 'warning',
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    @endif
    <div class="w-[97%]  mx-auto text-[20px] py-[3px] text-text">
        <p>ประชุม</p>
    </div>
    <div
        class="rounded-[5px] max-w-[97%] my-[10px] p-[30px] mx-auto shadow-[1px_2px_6px_rgba(0,0,0,0.38)] border-solid border-[1px] border-[#DFDFDF]">
        <div class="mt-4 overflow-auto h-screen ">
            <table id="myTable" class="nowrap table text-center w-full">
                <thead>
                    <tr>
                        <th>หัวข้อการประชุม</th>
                        <th>ผู้จัด</th>
                        <th>วันที่ประชุม</th>
                        <th>เข้าร่วม</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($meetings as $meeting)
                        <tr>
                            <th>{{ $meeting->topic }}</th>
                            <th>{{ $meeting->organizer }}</th>
                            <th>{{ $meeting->date }}</th>
                            <th><a href="{{ url('/AddUser', $meeting->id) }}"><i
                                        class="fa-solid fa-right-to-bracket fa-lg hover:scale-110 duration-500"></i></a>
                            </th>
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

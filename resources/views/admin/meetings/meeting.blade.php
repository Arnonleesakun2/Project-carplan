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
    <div class="w-[97%]  mx-auto text-[20px] py-[3px] text-text">
        <p>ประชุม/อบรม</p>
    </div>
    <div
        class="rounded-[5px] max-w-[97%] my-[10px] p-[30px] mx-auto shadow-[1px_2px_6px_rgba(0,0,0,0.38)] border-solid border-[1px] border-[#DFDFDF]">
        <div class="search mb-2  ">
            <div class="flex justify-end">
                <div class="button">
                    <label for="my_modal_5" class="py-[7px] px-[21px] bg-[#111827] text-white cursor-pointer rounded-[10px] hover:bg-[#374151] duration-300">+
                        เพิ่มการอบรม</label>
                </div>
            </div>
        </div>

        <div class="tatongtable">
            <div class="overflow-x-auto">
                <table id="myTable" class="nowrap table text-center w-full">
                    <thead>
                        <t>
                            <th>หัวข้อ</th>
                            <th>ผู้จัดอบรม</th>
                            <th>วันที่</th>
                            <th>ตรวจสอบ</th>
                            <th>ลบ</th>
                        </t>
                    </thead>
                    <tbody>
                        @foreach ($meetings as $meeting)
                            <tr">
                                <th>{{ $meeting->topic }}</th>
                                <th>{{ $meeting->organizer }}</th>
                                <th>{{ $meeting->date }}</th>
                                <th><a class="fa-solid fa-magnifying-glass fa-xl hover:scale-110 duration-500"
                                        href="{{ url('/Check', $meeting->id) }}"></a></th>
                                <th><a class="fa-regular fa-trash-can fa-xl hover:scale-110 duration-500"
                                        href="{{ url('/DeleteMeeting', $meeting->id) }}"></a></th>
                                </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin/meetings/addmeeting/_addmeeting_modal')
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

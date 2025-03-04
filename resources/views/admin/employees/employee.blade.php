{{-- รายชื่อพนักงานตาตง --}}
@extends('layout/Navbar/Navbar')
@section('title')
    พนักงานบริษัทตาตง
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
        <p>พนักงานในบริษัท</p>
    </div>
    <div
        class="rounded-[5px] max-w-[97%] my-[10px] p-[30px] mx-auto shadow-[1px_2px_6px_rgba(0,0,0,0.38)] border-solid border-[1px] border-[#DFDFDF]">
        <div class="lg:flex lg:justify-end lg:gap-[10px]">
            <a class="py-[7px] px-[25px] bg-[#111827] text-white rounded-[10px] hover:bg-[#374151] duration-300"
                href="{{ url('/ReportSalary') }}">รายงานเงินเดือน</a>
            <label for="my_modal_6" class="cursor-pointer py-[7px] px-[25px] bg-[#111827] text-white rounded-[10px] hover:bg-[#374151] duration-300">
                    เพิ่มบริษัท</li>
                </label>
            <label class="py-[7px] px-[25px] bg-[#111827] text-white rounded-[10px] hover:bg-[#374151] duration-300"
                for="my_modal_5" href="">ลบบริษัท</label>
        </div>
        <div class="con-table mt-4 pt-14">
            <table id="myTable" class="nowrap table text-center w-full">
                <thead>
                    <tr>
                        <th>ชื่อ</th>
                        <th>บริษัท</th>
                        <th>ตำแหน่ง</th>
                        <th>หน้าที่</th>
                        <th>เงินเดือน</th>
                        <th>เลขบัญชี</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->companys->name }}</td>
                            <td>{{ $employee->positions->name }}</td>
                            <td>{{ $employee->mainlines->name }}</td>
                            <td>{{ $employee->salarys[0]->name ??''}}</td>
                            <td>{{ $employee->accountnumbers[0]->name ??''}}</td>
                            <td>
                                <div class="dropdown dropdown-top dropdown-end">
                                    <div tabindex="0" class="fa-solid fa-ellipsis fa-xl"></div>
                                    <ul tabindex="0"
                                        class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-44">
                                        <li><a href="{{ url('/EmployeeInfo', $employee->id) }}"
                                                class=" fa-solid fa-eye hover:scale-110 duration-500">&nbsp;&nbsp;ข้อมูล</a>
                                        </li>
                                        <li><a class="fa-solid fa-pen-to-square hover:scale-110 duration-500"
                                                href="{{ url('/EmployeeEdit', $employee->id) }}">&nbsp;&nbsp;แก้ไข</a>
                                        </li>
                                        <li><a class="fa-solid fa-pen-to-square hover:scale-110 duration-500"
                                                href="{{ url('/AddAccountnumber', $employee->id) }}">&nbsp;&nbsp;แก้ไขเลขบัญชี</a>
                                        </li>
                                        <li><a class="fa-solid fa-calculator hover:scale-110 duration-500"
                                                href="{{ url('/CalSalary', $employee->id) }}">&nbsp;&nbsp;คำนวณเงินเดือน</a>
                                        </li>
                                        <li><a class="fa-solid fa-right-from-bracket hover:scale-110 duration-500"
                                                href="{{ url('/SelectOut', $employee->id) }}">&nbsp;&nbsp;พ้นสภาพ</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        @include('admin/employees/deletecompany/_deletecompany_modal')
        {{-- เพิ่มบริษัท --}}
        <input type="checkbox" id="my_modal_6" class="modal-toggle" />
        <div class="modal" role="dialog">
            <div class="modal-box  bg-[#FFFFFF] border-[1px] border-[#DFDFDF] shadow-[1px_2px_6px_rgba(0,0,0,0.38)]">
                <form action="{{ url('/AddCompany') }}" method="POST">
                    @csrf
                    <div class="text-center">
                        <p class="font-semibold">เพิ่มบริษัท</p>
                        <input name="company" type="text" placeholder="ชื่อบริษัท"
                            class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                            required />
                        @error('company')
                            <div class="invalid-feedback d-block text-red-700">{{ $errors->first('company') }}</div>
                        @enderror
                    </div>
                    <div style="--clr:#00A96E" class="button text-center mt-4">
                        <button type="submit"
                            class="py-[7px] px-[21px] bg-[#111827] text-white cursor-pointer rounded-[10px] hover:bg-[#374151] duration-300">บันทึก</button>
                        <label for="my_modal_6"
                            class="py-[7px] px-[21px] bg-[#FF5861] text-white rounded-[10px] hover:bg-[#EF4C53] duration-300">ยกเลิก</label>
                    </div>
                </form>
            </div>
        </div>
    @endsection
    @section('endscript')
        <script>
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

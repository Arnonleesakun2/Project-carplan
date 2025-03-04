{{-- EmployeeTable --}}
<div class="p-[30px] rounded-2xl  space-y-[20px] shadow-custom border bg-white">
    <div class="flex items-center justify-end space-x-2">
        <div class="text-xl font-bold uppercase tracking-wide text-gray-800">ตะกร้า :</div>
        <button onclick="my_basket.showModal()"
            class="bg-gray-800 text-white hover:bg-gray-700 px-4 py-2 rounded-md transition">
            <i class="fa-solid fa-plus"></i>
        </button>
    </div>
    <table id="employeesTable" class=" table text-center w-full">
        <thead class="text-black text-[17px] font-bold">
            <tr class="Font-Thai">
                <th>ชื่อ</th>
                <th>ชื่อเล่น</th>
                <th>เบอร์โทร</th>
                <th>ประเภทพนักงาน</th>
                <th>บริษัท</th>
            </tr>
        </thead>
        <tbody class="">
            @foreach ($employees as $employee)
                <tr class="Font-Thai">
                    <th>{{ $employee->name }}</th>
                    <th>{{ $employee->nickname }}</th>
                    <th>{{ $employee->tel }}</th>
                    <th>{{ $employee->positions->name }}</th>
                    <th>{{ $employee->companys->name }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- CarTable --}}
<div class="p-6 bg-white rounded-xl border space-y-4 shadow-lg">
    <div class="flex justify-between items-center">
        <h3 class="text-xl font-bold uppercase tracking-wide text-gray-800">รถ</h3>
        <button onclick="my_car.showModal()"
            class="bg-gray-800 text-white hover:bg-gray-700 px-4 py-2 rounded-md transition">
            <i class="fa-solid fa-plus"></i>
        </button>
    </div>
    <div class="overflow-x-auto max-h-[400px] ">
        <table class="w-full text-center border-separate border-spacing-y-2 table-auto" id="tablecar">
            <thead class="bg-gray-100 text-gray-700 sticky top-0 z-10">
                <tr>
                    <th class="px-4 py-3 rounded-l-[7px]">ทะเบียนรถ</th>
                    <th class="px-4 py-3 ">เบอร์รถ</th>
                    <th class="px-4 py-3 ">ขนาดรถ</th>
                    <th class="px-4 py-3 ">น้ำหนักจำกัด(ก.ก)</th>
                    <th class="px-4 py-3 ">สถานะ</th>
                    <th class="px-4 py-3 ">แก้ไข</th>
                    <th class="px-4 py-3 rounded-r-[7px]">ลบ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr class="bg-white hover:bg-gray-50 text-gray-800 border-b">
                        <th class="px-4 py-1 rounded-l-[7px] border-l-[1px]">{{ $car->license }}</th>
                        <th class="px-4 py-1">{{ $car->number }}</th>
                        <th class="px-4 py-1">{{ $car->cartypes->name }}</th>
                        <th class="px-4 py-1">{{ $car->weight }}</th>
                        <th class="px-4 py-1 flex justify-center items-center z-1 ">
                            <button
                                class="car-toggle-status w-8 h-8 flex items-center justify-center rounded-full shadow-lg transition-all duration-500 ease-in-out"
                                data-id="{{ $car->id }}" data-status="{{ $car->status }}"
                                style="background: {{ $car->status ? 'linear-gradient(135deg, #16A085, #1ABC9C)' : 'linear-gradient(135deg, #E74C3C, #C0392B)' }};">
                                <i
                                    class="fa-solid {{ $car->status ? 'fa-check' : 'fa-times' }} text-white text-lg transition-all duration-500 ease-in-out"></i>
                            </button>
                        </th>
                        <th class="px-4 py-1">
                            <button id="btneditcar" onclick="my_car_edit.showModal()" data-id="{{ $car->id }}"
                                data-license="{{ $car->license }}" data-number="{{ $car->number }}"
                                data-size="{{ $car->cartypes->name }}" data-carweight="{{ $car->weight }}">
                                <i class="fa-solid fa-pen-to-square hover:scale-125 duration-700"></i>
                            </button>
                        </th>
                        <th class="px-4 py-1 rounded-r-[7px] border-r-[1px]">
                            <a href="" data-id="{{ $car->id }}" id="cardelete">
                                <i class="fa-solid fa-trash hover:scale-125 duration-700"></i>
                            </a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

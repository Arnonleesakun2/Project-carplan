{{-- CartypeTable --}}
<div class="p-6 bg-white rounded-xl border space-y-4 shadow-lg">
    <div class="flex justify-between items-center">
        <h3 class="text-xl font-bold uppercase tracking-wide text-gray-800">ชนิดรถ</h3>
        <button onclick="my_cartype.showModal()"
            class="bg-gray-800 text-white hover:bg-gray-700 px-4 py-2 rounded-md transition">
            <i class="fa-solid fa-plus"></i>
        </button>
    </div>
    <div class="overflow-x-auto no-scrollbar max-h-[200px]">
        <table class="w-full text-center border-separate border-spacing-y-2" id="tablecartype">
            <thead class="bg-gray-100 text-gray-700 sticky top-0 z-10">
                <tr>
                    <th class="px-4 py-3 rounded-l-[7px]">ชนิดรถ</th>
                    <th class="px-4 py-3 rounded-r-[7px]">ลบ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartypes as $cartype)
                    <tr class="bg-white hover:bg-gray-50 text-gray-800 border-b">
                        <th class="px-4 py-1 rounded-l-[7px] border-l-[1px]">{{ $cartype->name }}</th>
                        <th class="px-4 py-1 rounded-r-[7px] border-r-[1px]">
                            <a href="" data-id="{{ $cartype->id }}" id="cartypedelete">
                                <i class="fa-solid fa-trash hover:scale-125 duration-700"></i>
                            </a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

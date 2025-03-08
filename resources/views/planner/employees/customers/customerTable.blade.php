{{-- CustomerTable --}}
<div class="p-6 bg-white rounded-xl border space-y-4 shadow-lg">
    <div class="flex justify-between items-center">
        <h3 class="text-xl font-bold uppercase tracking-wide text-gray-800">ลูกค้า</h3>
        <div class="">
            <a href="/CustomerExportpdf" target="_blank">
                <button class="bg-gray-800 text-white hover:bg-gray-700 px-4 py-2 rounded-md transition">
                    <i class="fa-solid fa-file-pdf"></i>
                </button>
            </a>
            <button onclick="my_customer.showModal()"
                class="bg-gray-800 text-white hover:bg-gray-700 px-4 py-2 rounded-md transition">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>

    </div>
    <div class="overflow-x-auto no-scrollbar  max-h-[200px]">
        <table class="w-full text-center border-separate border-spacing-y-2" id="tablecustomer">
            <thead class="bg-gray-100 text-gray-700 sticky top-0 z-10">
                <tr>
                    <th class="px-4 py-3 rounded-l-[7px]">ลูกค้า</th>
                    <th class="px-4 py-3 rounded-r-[7px]">ลบ</th>
                </tr>
            </thead>
            <tbody class="space-y-2">
                @foreach ($customers as $customer)
                    <tr class="bg-white hover:bg-gray-50 text-gray-800 border-b">
                        <th class="px-4 py-1 rounded-l-[7px] border-l-[1px]">{{ $customer->customer }}</th>
                        <th class="px-4 py-1 rounded-r-[7px] border-r-[1px]">
                            <a href="" id="customerdelete" data-id="{{ $customer->id }}">
                                <i class="fa-solid fa-trash hover:scale-125 duration-700"></i>
                            </a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

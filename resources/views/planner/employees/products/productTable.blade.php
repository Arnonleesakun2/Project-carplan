{{-- ProductTable --}}
<div class="p-6 bg-white rounded-xl border space-y-4 shadow-lg">
    <div class="flex justify-between items-center">
        <h3 class="text-xl font-bold uppercase tracking-wide text-gray-800">สินค้า</h3>
        <div class="">
            <a href="/ProductExportpdf" target="_blank">
                <button class="bg-gray-800 text-white hover:bg-gray-700 px-4 py-2 rounded-md transition">
                    <i class="fa-solid fa-file-pdf"></i>
                </button>
            </a>
            <button onclick="my_product.showModal()"
                class="bg-gray-800 text-white hover:bg-gray-700 px-4 py-2 rounded-md transition">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="overflow-x-auto max-h-[400px]">
        <table class="w-full text-center border-separate border-spacing-y-2" id="tableproduct">
            <thead class="bg-gray-100 text-gray-700 sticky top-0 z-10">
                <tr>
                    <th class="px-4 py-3 rounded-l-[7px]">ลูกค้า</th>
                    <th class="px-4 py-3">สินค้า</th>
                    <th class="px-4 py-3">น้ำหนักตะกร้า</th>
                    <th class="px-4 py-3">แก้ไข</th>
                    <th class="px-4 py-3 rounded-r-[7px]">ลบ</th>
                </tr>
            </thead>
            <tbody class="space-y-2">
                @foreach ($products as $product)
                    <tr class="bg-white hover:bg-gray-50 text-gray-800 border-b">
                        <th class="px-4 py-1 rounded-l-[7px] border-l-[1px]">
                            {{ $product->customers->customer }}</th>
                        <th class="px-4 py-1">{{ $product->product }}</th>
                        <th class="px-4 py-1">{{ $product->weight }}</th>
                        <th class="px-4 py-1">
                            <button id="btneditproduct" onclick="my_product_edit.showModal()"
                                data-id="{{ $product->id }}" data-product="{{ $product->product }}"
                                data-weight="{{ $product->weight }}" data-customer="{{ $product->customers->id }}">
                                <i class="fa-solid fa-pen-to-square hover:scale-125 duration-700"></i>
                            </button>
                        </th>
                        <th class="px-4 py-1 rounded-r-[7px] border-r-[1px]">
                            <a href="" id="productdelete" data-id="{{ $product->id }}">
                                <i class="fa-solid fa-trash hover:scale-125 duration-700"></i>
                            </a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

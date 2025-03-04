{{-- เพิ่มสินค้า --}}
<dialog id="my_product" class="modal">
    <div class="modal-box bg-white rounded-2xl shadow-custom">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-black hover:bg-black/40">✕
            </button>
        </form>
        <div class="">
            <h3 class="text-[20px] font-bold text-black">เพิ่มสินค้า</h3>
            <div class="mt-[10px]">
                <form id="form-product" class="space-y-2" action="">
                    <div class="space-y-2">
                        <select id="customer"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            required>
                            <option value="" disabled selected>ลูกค้า</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->customer }}</option>
                            @endforeach
                        </select>
                        <input placeholder="สินค้า" id="product" name="product" value="" type="text"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            required />
                        <input placeholder="น้ำหนัก" id="weight" name="weight" value="" type="number"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            required />
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="py-[7px] px-[21px] text-white bg-black cursor-pointer rounded-[10px] hover:bg-[#4A5568] hover:translate-x-1 duration-700">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</dialog>

{{-- แก้ไขสินค้า --}}
<dialog id="my_product_edit" class="modal">
    <div class="modal-box bg-white rounded-2xl shadow-custom">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-black hover:bg-black/40">✕
            </button>
        </form>
        <div class="">
            <h3 class="text-[20px] font-bold text-black">แก้ไขสินค้า</h3>
            <div class=" mt-[10px]">
                <form id="form-editproduct" class="space-y-2" action="">
                    <div class="space-y-2">
                        <input id="editIdproduct" name="id" value="" type="text"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            hidden />
                        <select id="editcustomer"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            required>
                            <option value="" disabled selected>เลือกลูกค้า</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->customer }}</option>
                            @endforeach
                        </select>
                        <input id="editproduct" name="product" value="" type="text"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black" />
                        <input id="editweight" name="weight" value="" type="number"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black" />
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="py-[7px] px-[21px] text-white bg-black cursor-pointer rounded-[10px] hover:bg-[#4A5568] hover:translate-x-1 duration-700">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</dialog>

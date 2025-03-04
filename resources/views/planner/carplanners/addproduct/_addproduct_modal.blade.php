{{-- เพิ่มสินค้า --}}
<dialog id="my_addproduct" class="modal">
    <div class="modal-box bg-white rounded-2xl shadow-custom">
        <div method="dialog">
            <button type="button" onclick="my_addproduct.close()"
                class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-black hover:bg-black/40">✕
            </button>
        </div>
        <div class="">
            <h3 class="text-[20px] font-bold text-black">เพิ่มสินค้า (ต้องเลือกลูกค้าก่อนสินค้าถึงจะแสดง)</h3>
            <div class="pt-[20px]">
                <div class="space-y-2">
                    <div class="space-y-2">
                        <div class="">
                            <select id="branch-select"
                                class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black">
                                <option disabled selected>เลือกสาขา</option>
                            </select>
                        </div>
                        <div class="">
                            <select id="product-select"
                                class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black">
                                <option disabled selected>เลือก</option>

                            </select>
                        </div>
                        <div class="">
                            <input id="weightproduct-input" placeholder="น้ำหนักสินค้า"
                                class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                                type="number" />
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="btnaddporduct"
                            class="py-[7px] px-[21px] text-white bg-black cursor-pointer rounded-[10px] hover:bg-[#4A5568] hover:translate-x-1 duration-700">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</dialog>

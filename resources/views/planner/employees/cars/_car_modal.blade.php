{{-- รถ --}}
<dialog id="my_car" class="modal">
    <div class="modal-box bg-white rounded-2xl shadow-custom">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-black hover:bg-black/40">✕
            </button>
        </form>
        <div class="">
            <h3 class="text-[20px] font-bold text-black">เพิ่มรถ</h3>
            <div class="pt-[20px]">
                <form id="form-car" class="space-y-2" action="">
                    <div class="space-y-2">
                        <input placeholder="ทะเบียนรถ" id="license" name="license" value="" type="text"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            required />
                        <input placeholder="เบอร์รถ" id="number" name="number" value="" type="number"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            required />
                        <select id="size"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            required>
                            <option disabled selected>ขนาดรถ</option>
                            @foreach ($cartypes as $cartype)
                                <option value="{{ $cartype->id }}">{{ $cartype->name }}</option>
                            @endforeach
                        </select>
                        <input placeholder="น้ำหนักจำกัด(ก.ก)" id="carweight" name="weight" value=""
                            type="number"
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
{{-- แก้ไขรถ --}}
<dialog id="my_car_edit" class="modal">
    <div class="modal-box bg-white rounded-2xl shadow-custom">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-black hover:bg-black/40">✕
            </button>
        </form>
        <div class="">
            <h3 class="text-[20px] font-bold text-black">แก้ไขรถ</h3>
            <div class="pt-[20px]">
                <form id="form-editcar" class="space-y-2" action="">
                    <div class="space-y-2">
                        <input id="editIdcar" name="editIdcar" value="" type="text"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            hidden />
                        <input id="editlicense" name="editlicense" value="" type="text"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            required />
                        <input id="editnumber" name="editnumber" value="" type="number"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            required />
                        <select id="select-cars"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            required>
                            <option value="" disabled selected>เลือกขนาดรถ</option>
                            @foreach ($cartypes as $cartype)
                                <option value="{{ $cartype->id }}">{{ $cartype->name }}</option>
                            @endforeach
                        </select>
                        <input id="editcarweight" name="editcarweight" value="" type="number"
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

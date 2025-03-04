<form action="{{ url('/Cal') }}" method="POST">
    @csrf
    @method('patch')
    <input type="hidden" value="{{ $employee->id }}" name="id">
    <div class="text-[20px] py-[10px] text-text">
        <p>ข้อมูลสำคัญ</p>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-3 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p>ชื่อ-นามสกุล:</p>
            <input name="name" value="{{ $employee->name }}" type="text"
                class="input  h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
            @error('name')
                <div class="invalid-feedback d-block text-red-700">{{ $errors->first('name') }}</div>
            @enderror
        </div>
        <div class="">
            <p>เงินเดือน:</p>
            <input class="input  h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" id="salary" type="number" name="salary" value="{{ $employee->salarys[0]->name }}">
            @error('salary')
                <div class="invalid-feedback d-block text-red-700">{{ $errors->first('salary') }}</div>
            @enderror
        </div>
        <div class="">
            <p>วันที่คำนวณเงิน:</p>
            <input name="datecal" type="date" class="input  h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
            @error('datecal')
                <div class="invalid-feedback d-block text-red-700">{{ $errors->first('datecal') }}</div>
            @enderror
        </div>
    </div>
    <div class="lg:grid lg:grid-cols-2 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p class="text-2xl">โบนัส</p>
            <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-2 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
                <div class="">
                    <p>เบี้ยขยัน:</p>
                    <input id="bonus" name="bonus" type="number" class="input  h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
                </div>
                <div class="">
                    <p>หน้าร้าน(ประกันขับขี่):</p>
                    <input id="storefront" name="storefront" type="number" class="input  h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
                </div>
            </div>
        </div>
        
        <div class="">
            <p class="text-2xl">ค่าปรับ</p>
            <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
                <div class="">
                    <p>ขาดงาน:</p>
                    <input id="missingwork" name="missingwork" type="number"
                        class="input  h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
                </div>
                <div class="">
                    <p>สินค้าหาย:</p>
                    <input id="lostproduct" name="lostproduct" type="number"
                        class="input  h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
                </div>
                <div class="">
                    <p>ค่าปรับตำรวจ:</p>
                    <input id="poicefine" name="poicefine" type="number"
                        class="input  h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
                </div>
                <div class="">
                    <p>ค่าปรับขนส่ง:</p>
                    <input id="transportfine" name="transportfine" type="number"
                        class="input  h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
                </div>
                <div class="">
                    <p>สวัสการเงินยืม:</p>
                    <input id="welfareloan" name="welfareloan" type="number"
                        class="input  h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
                </div>
                <div class="">
                    <p>กยศ:</p>
                    <input id="ava" name="ava" type="number" class="input  h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
                </div>
                <div class="">
                    <p>ประกันขับขี่:</p>
                    <input id="drivinginsurance" name="drivinginsurance" type="number"
                        class="input  h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
                </div>
                <div class="">
                    <p>ผลรวม:</p>
                    <input type="number" class="total input  h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" disabled />
                    <input id="total" type="hidden" name="total">
                    @error('total')
                        <div class="invalid-feedback d-block text-red-700">{{ $errors->first('total') }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class=" mt-10 w-11/12 mx-auto mb-8">
        <div class=" text-center">
            <div class="button ">
                <button  type="button" id="btn-cal" class="py-[7px] px-[21px] bg-[#111827] text-white cursor-pointer rounded-[10px] hover:bg-[#374151] duration-300">คำนวณเงินเดือน</button>
                <label
                    class="py-[7px] px-[21px] bg-[#111827] text-white cursor-pointer rounded-[10px] hover:bg-[#374151] duration-300"
                    for="my_modal_6" href="">บันทึก</label>
                <input type="checkbox" id="my_modal_6" class="modal-toggle" />
                <div class="modal" role="dialog">
                    <div
                        class="modal-box  bg-[#FFFFFF] border-[1px] border-[#DFDFDF] shadow-[1px_2px_6px_rgba(0,0,0,0.38)]">
                        <h3 class="font-bold text-lg">แน่ใจว่าจะบึนทึก</h3>
                        <p class="py-4">คลิกปุ่มยกเลิกเพื่อกลับ</p>
                        <div class="modal-action">
                            <button type="submit"
                                class="py-[7px] px-[21px] bg-[#111827] text-white cursor-pointer rounded-[10px] hover:bg-[#374151] duration-300">บันทึก</button>
                            <label for="my_modal_6"
                                class="py-[7px] px-[21px] bg-[#FF5861] text-white rounded-[10px] hover:bg-[#EF4C53] duration-300 cursor-pointer">ยกเลิก</label>
                        </div>
                    </div>
                </div>
                </dialog>
                <a class="py-[7px] px-[21px] bg-[#FF5861] text-white rounded-[10px] hover:bg-[#EF4C53] duration-300"
                    href="{{ url('/Employees') }}">ยกเลิก</a>
            </div>
        </div>
    </div>
</form>
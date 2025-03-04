<form action="{{ url('/NewUpdateEmployees') }}" method="POST">
    @csrf
    @method('patch')
    <input type="hidden" name="id" value="{{$employees->id}}">
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-3 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p>ชื่อ:</p>
            <input name="name" value="{{ $employees->name }}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly/>
        </div>
        <div class="">
            <p>เลขบัญชี:</p>
            <input name="accountnumber" type="text" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" required/>
            @error('accountnumber')
                <div class="invalid-feedback d-block text-red-700">{{ $errors->first('accountnumber') }}</div>
            @enderror
        </div>
        <div class="">
            <p>เงินเดือน:</p>
            <input name="salary" type="text" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" required/>
            @error('salary')
                <div class="invalid-feedback d-block text-red-700">{{ $errors->first('salary') }}</div>
            @enderror
        </div>
    </div>
    <div class=" w-11/12 mx-auto lg:grid lg:grid-cols-3 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p>บริษัท:</p>
            <select name="company" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"required>
                <option value="" disabled selected>เลือก</option>
                @foreach ($companys as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
            @error('company')
                <div class="invalid-feedback d-block text-red-700">{{ $errors->first('company') }}</div>
            @enderror
        </div>
        <div class="">
            <p>ตำแหน่งงาน:</p>
            <select name="position" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"required>
                <option value="" disabled selected>เลือก</option>
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                @endforeach
            </select>
            @error('position')
                <div class="invalid-feedback d-block text-red-700">{{ $errors->first('position') }}</div>
            @enderror
        </div>
        <div class="">
            <p>เลือกสายงาน:</p>
            <select name="mainline" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"required>
                <option value="" disabled selected>เลือก</option>
                @foreach ($mainlines as $mainline)
                    <option value="{{ $mainline->id }}">{{ $mainline->name }}</option>
                @endforeach
            </select>
            @error('mainline')
                <div class="invalid-feedback d-block text-red-700">{{ $errors->first('mainline') }}</div>
            @enderror
        </div>
        
    </div>
    <div class=" mt-10 w-11/12 mx-auto mb-8">
        <div class=" text-center">
            <div class="button ">
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
                    href="{{ url('/ShowWaitting') }}">ยกเลิก</a>
            </div>
        </div>
    </div>
</form>
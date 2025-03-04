{{-- ลบบริษัท --}}
<input type="checkbox" id="my_modal_5" class="modal-toggle " />
<div class="modal" role="dialog">
    <div class="modal-box  bg-[#FFFFFF] border-[1px] border-[#DFDFDF] shadow-[1px_2px_6px_rgba(0,0,0,0.38)]">
        <form action="{{ url('/DeleteCompany') }}" method="POST">
            @csrf
            <div class="text-center">
                <p class="font-semibold">ลบบริษัท</p>
                <select name="company"
                    class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]">
                    <option disabled selected>เลือก</option>
                    @foreach ($companys as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
                @error('company')
                    <div class="invalid-feedback d-block text-red-700">{{ $errors->first('company') }}</div>
                @enderror
            </div>
            <div class="button text-center mt-4">
                <button type="submit" class="py-[7px] px-[21px] bg-[#111827] text-white cursor-pointer rounded-[10px] hover:bg-[#374151] duration-300">บันทึก</button>
                <label for="my_modal_5" class="py-[7px] px-[21px] bg-[#FF5861] text-white rounded-[10px] hover:bg-[#EF4C53] duration-300">ยกเลิก</label>
            </div>
        </form>
    </div>
</div>

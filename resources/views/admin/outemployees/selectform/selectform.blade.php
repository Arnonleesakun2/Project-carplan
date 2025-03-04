<form action="{{url('/Select')}}" method="POST">
    @csrf
    @method('patch')
    <input type="hidden" name="id" value="{{$employee->id}}">
    <div class="mt-10 w-full mx-auto mb-8 text-center">
        <div class="">
            <p class="mb-2 ">เลือกสถานะ</p>
            <select name="outsts" class="input h-[40px] w-[50%] mx-auto border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" >
                <option disabled selected>เลือก</option>
                @foreach ($outsts as $outst)
                    <option value="{{$outst->id}}">{{$outst->name}}</option>
                @endforeach
            </select>
            @error('outsts')
                <div class="invalid-feedback d-block text-red-700">{{ $errors->first('outsts') }}</div>
            @enderror
        </div>
    </div>
    <div class="mt-10 w-11/12 mx-auto mb-8">
            <div class="button text-center">
                <label class="py-[7px] px-[21px] bg-[#111827] text-white cursor-pointer rounded-[10px] hover:bg-[#374151] duration-300" for="my_modal_6" 
                    href="">บันทึก</label>
                <input type="checkbox" id="my_modal_6" class="modal-toggle" />
                <div class="modal" role="dialog">
                    <div class="modal-box">
                        <h3 class="font-bold text-lg">แน่ใจว่าจะบึนทึก</h3>
                        <p class="py-4">คลิกปุ่มยกเลิกเพื่อกลับ</p>
                        <div class="modal-action">
                            <button  type="submit"
                                class="py-[7px] px-[21px] bg-[#111827] text-white cursor-pointer rounded-[10px] hover:bg-[#374151] duration-300">บันทึก</button>
                            <label  for="my_modal_6"
                                class="py-[7px] px-[21px] bg-[#FF5861] text-white rounded-[10px] hover:bg-[#EF4C53] duration-300">ยกเลิก</label>
                        </div>
                    </div>
                </div>
                </dialog>
                <a class="py-[7px] px-[21px] bg-[#FF5861] text-white rounded-[10px] hover:bg-[#EF4C53] duration-300" href="{{ url('/Employees') }}">ยกเลิก</a>
            </div>
    </div>
</form>
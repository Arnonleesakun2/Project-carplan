{{-- เพิ่มประชุม --}}
<input type="checkbox" id="my_modal_5" class="modal-toggle" />
<div class="modal " role="dialog">
    <div class="modal-box max-w-4xl">
        <form action="{{ url('/CreateMeeting') }}" method="POST">
            @csrf
            <div class=" w-11/12 mx-auto lg:grid lg:grid-cols-3 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
                <div class="">
                    <p>หัวข้อ:</p>
                    <input name="topic" type="text" placeholder="Type here"
                        class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px] " required/>
                    @error('topic')
                        <div class="invalid-feedback d-block text-red-700">{{ $errors->first('topic') }}</div>
                    @enderror
                </div>
                <div class="">
                    <p>ผู้จัด:</p>
                    <input name="organizer" type="text" placeholder="Type here"
                        class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" required/>
                    @error('organizer')
                        <div class="invalid-feedback d-block text-red-700">{{ $errors->first('organizer') }}</div>
                    @enderror
                </div>
                <div class="">
                    <p>วันที่ประชุม:</p>
                    <input name="datemeeting" type="date" placeholder="Type here"
                        class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" required/>
                    @error('datemeeting')
                        <div class="invalid-feedback d-block text-red-700">{{ $errors->first('datemeeting') }}</div>
                    @enderror
                </div>
            </div>
            <div class="button text-center mt-4">
                <button type="submit" class="py-[7px] px-[21px] bg-[#111827] text-white cursor-pointer rounded-[10px] hover:bg-[#374151] duration-300">บันทึก</button>
                <label for="my_modal_5" class="py-[7px] px-[21px] bg-[#FF5861] text-white rounded-[10px] hover:bg-[#EF4C53] duration-300 cursor-pointer">ยกเลิก</label>
            </div>
        </form>
    </div>
</div>
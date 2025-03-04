<div class="rounded-[5px] max-w-[97%] my-[10px] p-[30px] mx-auto shadow-[1px_2px_6px_rgba(0,0,0,0.38)] border-solid border-[1px] border-[#DFDFDF]">
    <div class="w-full">
        <div class="w-full  mt-8">
            <img class="w-40 h-48 rounded-lg border-solid border-[1px] border-[#514F59] mx-auto" src="{{url('uploads/'.$employee->image)}}">
        </div>
    </div>
    <div class="text-[20px] py-[10px] text-text">
        <p>ข้อมูลสำคัญ</p>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class=" items-center">
            <p> วันที่มาสมัคร:</p>
            <input value="{{ $employee->date }}" type="text" class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" readonly/>
        </div>
        <div class=" items-center">
            <p>เกิดวันที่:</p>
            <input value="{{ $employee->brithday }}" type="text" class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" readonly/>
        </div>
        <div class="">
            <p>คำนำหน้า</p>
            <input value="{{ $employee->prefixs->name }}"type="text" class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" readonly/>
        </div>
        <div class="">
            <p>ชื่อ-นามสกุล</p>
            <input value="{{ $employee->name }}" type="text" class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" readonly/>
        </div>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p>ชื่อเล่น</p>
            <input value="{{ $employee->nickname }}" type="text" class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
        <div class="">
            <p>อายุ</p>
            <input value="{{ $employee->age }}" type="text" class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" readonly/>
        </div>
        <div class="">
            <p>เบอร์ดโทร</p>
            <input value="{{ $employee->tel }}" type="text" class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
        <div class="">
            <p>เลขประจำตัว 13 หลัก</p>
            <input value="{{ $employee->idcard }}" type="text" class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p>เงินเดือนที่ต้องการ</p>
            <input value="{{ $employee->needsalary ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
        <div class="">
            <p>จำนวนบุตร</p>
            <input value="{{ $employee->childens[0]->onchilden ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
        <div class="">
            <p>กำลังศึกษาอยู่กี่คน</p>
            <input value="{{ $employee->childens[0]->stum ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-3 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p>ที่อยู่ปัจจุบัน</p>
            <input value="{{ $employee->address }}" type="text" class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
        <div class="">
            <p>ที่อยู่ที่ทำงาน</p>
            <input value="{{ $employee->cardaddress }}" type="text" class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
        <div class="">
            <p>เกิดที่จังหวัด</p>
            <input value="{{ $employee->pobirth }}" type="text" class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p>สถานะภาพ</p>
            <input value="{{ $employee->psts->name ?? '' }}" type="text" class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
        <div class="">
            <p>สัญชาติ</p>
            <input value="{{ $employee->nationalitys->name }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
        <div class="">
            <p>เชื้อชาติ</p>
            <input value="{{ $employee->races->name }}" type="text" class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
        <div class="">
            <p>ศาสนา</p>
            <input value="{{ $employee->religions->name }}" type="text" class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
    </div>
    <div class="text-[20px] py-[3px] text-text">
        <p>ข้อมูลทั่วไป</p>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p>ผ่านการเกณฑ์มาหรือยัง</p>
            <input value="{{ $employee->typemilitarys->name ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
        <div class="">
            <p>ถ้ายังถึงกำหนดเมือไร</p>
            <input value="{{ $employee->militarys[0]->datemilitary ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
        <div class="">
            <p>ท่านมีใบขับขี่ประเภทใด</p>
            <input value="{{ $employee->divingcards->name ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
        <div class="">
            <p>สามารถขับขี่ยานพาหนะประเภท</p>
            <input value="{{ $employee->cartypes->name ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p>วันอนุญาต</p>
            <input value="{{ $employee->agedivingcards[0]->yearstart ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
        <div class="">
            <p>วันสิ้นอายุ</p>
            <input value="{{ $employee->agedivingcards[0]->yearend ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
        <div class="">
            <p>เคยมีส่วนในคดีอะไรบ้าง</p>
            <input value="{{ $employee->cases[0]->case ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
        <div class="">
            <p>พร้อมจะปฏิบัติงานต่างจังหวัดหรือไม่</p>
            <input value="{{ $employee->towork }}"type="text" class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p>วัคซีนโควิคเข็ม1</p>
            <input value="{{ $employee->vaccines[0]->name1 ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" readonly/>
        </div>
        <div class="">
            <p>วัคซีนโควิคเข็ม2</p>
            <input value="{{ $employee->vaccines[0]->name2 ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" readonly/>
        </div>
        <div class="">
            <p>เคยสมัครงานที่นี้เมื่อวันที่</p>
            <input value="{{ $employee->jopps[0]->datejop ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" readonly/>
        </div>
        <div class="">
            <p>ท่านติดสารเสพติดหรือไม่</p>
            <input value="{{ $employee->addicteds[0]->name ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" readonly/>
        </div>
        <div class="">
            <p>เคยป่วยร้ายเเรงหรือเป็นโรคติดต่อหรือไม่</p>
            <input value="{{ $employee->diseases[0]->name ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" readonly/>
        </div>
    </div>
    <div class="text-[20px] py-[3px] text-text">
        <p>ข้อมูลการศึกษา</p>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p>ประเภทการศึกษาที่1</p>
            <input value="{{ $employee->typeeducations->name ?? '' }} " type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" readonly />
        </div>
        <div class="">
            <p>ตั่งแต่ปี</p>
            <input value="{{ $employee->educations[0]->yearstart ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" readonly />
        </div>
        <div class="">
            <p>ถึงปี</p>
            <input value="{{ $employee->educations[0]->yearend ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" readonly />
        </div>
        <div class="">
            <p>สถารศึกษา/ที่ตั่ง</p>
            <input value="{{ $employee->educations[0]->location ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" readonly />
        </div>
        <div class="">
            <p>วุฒิที่ได้รับ</p>
            <input value="{{ $employee->educations[0]->degree ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" readonly />
        </div>
        <div class="">
            <p>เกรดเฉลี่ยรวม</p>
            <input value="{{ $employee->educations[0]->gpa ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" readonly />
        </div>
        <div class="">
            <p>วิชาเอก</p>
            <input value="{{ $employee->educations[0]->major ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" readonly />
        </div>
    </div>
    <div class="text-[20px] py-[3px] text-text">
        <p>กรณีเร่งด่วน บุคคลที่สามารถติดต่อได้</p>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p>ชื่อ-นามสกุล</p>
            <input value="{{ $employee->acquaintances[0]->name ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
        <div class="">
            <p>ที่อยู่</p>
            <input value="{{ $employee->acquaintances[0]->address ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
        <div class="">
            <p>เบอร์โทร</p>
            <input value="{{ $employee->acquaintances[0]->tel ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
        <div class="">
            <p>ความสัมพันธ์</p>
            <input value="{{ $employee->acquaintances[0]->relation ?? '' }}" type="text"
                class="input focus:outline-none h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"readonly />
        </div>
    </div>
    <div class="">
        <div class="button text-center">
            <a class="py-[7px] px-[21px] bg-[#FF5861] text-white rounded-[10px] hover:bg-[#EF4C53] duration-300"  href="{{url('/ShowWaitting')}}">ย้อนกลับ</a>
        </div>
    </div>
</div>
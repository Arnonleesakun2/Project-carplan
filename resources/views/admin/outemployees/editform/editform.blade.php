<form action="{{ url('/OutUpdate') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <input type="hidden" name="id" value="{{$employee->id}}">
    <div class="text-[20px] py-[10px] text-text">
        <p>ข้อมูลสำคัญ</p>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class=" items-center">
            <p c> วันที่มาสมัคร:</p>
            <input name="date" value="{{ $employee->date ?? ''}}" type="date"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class=" items-center">
            <label>เกิดวันที่:</label>
            <input name="brithday" value="{{ $employee->brithday ?? ''}}" type="date"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>สถานะ</p>
            <select name="outsts" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]">
                <option value="{{ $employee->outsts->id ?? ''}}">{{ $employee->outsts->name }}</option>
                @foreach ($outsts as $outst)
                    <option value="{{ $outst->id }}">{{ $outst->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <p>คำนำหน้า</p>
            <select name="prefix" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]">
                <option value="{{ $employee->prefixs->id ?? ''}}">{{ $employee->prefixs->name }}</option>
                @foreach ($prefixs as $prefix)
                    <option value="{{ $prefix->id }}">{{ $prefix->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p>ชื่อ-นามสกุล</p>
            <input name="name" value="{{ $employee->name ?? ''}}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>ชื่อเล่น</p>
            <input name="nickname" value="{{ $employee->nickname ?? ''}}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>อายุ</p>
            <input name="age" value="{{ $employee->age ?? ''}}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>เบอร์ดโทร</p>
            <input name="tel" value="{{ $employee->tel ?? ''}}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>เลขประจำตัว 13 หลัก</p>
            <input name="idcard" value="{{ $employee->idcard ?? ''}}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>จำนวนบุตร</p>
            <input name="onchilden" value="{{ $employee->childens[0]->onchilden ?? '' }}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>กำลังศึกษาอยู่กี่คน</p>
            <input name="stum" value="{{ $employee->childens[0]->stum ?? '' }}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-3 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p>ที่อยู่ปัจจุบัน</p>
            <input name="address" value="{{ $employee->address ?? ''}}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>ที่อยู่ที่ทำงาน</p>
            <input name="cardaddress" value="{{ $employee->cardaddress ?? ''}}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>เกิดที่จังหวัด</p>
            <input name="pobirth" value="{{ $employee->pobirth ?? ''}}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p>บริษัท</p>
            <select name="company" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]l">
                <option value="{{ $employee->companys->id ?? ''}}">{{ $employee->companys->name ?? ''}}</option>
                @foreach ($companys as $company)
                    <option value="{{ $company->id ?? ''}}">{{ $company->name ?? ''}}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <p>ทำงานตำเเหน่ง</p>
            <select name="position" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]l">
                <option value="{{ $employee->positions->id ?? ''}}">{{ $employee->positions->name ?? ''}}</option>
                @foreach ($positions as $position)
                    <option value="{{ $position->id ?? ''}}">{{ $position->name ?? ''}}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <p>หน้าที่</p>
            <select name="mainline" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]l">
                <option value="{{ $employee->mainlines->id ?? ''}}">{{ $employee->mainlines->name ?? ''}}</option>
                @foreach ($mainlines as $mainline)
                    <option value="{{ $mainline->id ?? ''}}">{{ $mainline->name ?? ''}}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <p>เงินเดือน</p>
            <input name="salary" value="{{ $employee->salarys[0]->name ?? '' }}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p>สถานะภาพ</p>
            <select name="psts" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]">
                <option value="{{ $employee->psts->id ?? '' }}">{{ $employee->psts->name ?? '' }}</option>
                @foreach ($psts as $pst)
                    <option value="{{ $pst->id ?? ''}}">{{ $pst->name ?? ''}}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <p>สัญชาติ</p>
            <select name="nationlity" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]">
                <option value="{{ $employee->nationalitys->id ?? ''}}">{{ $employee->nationalitys->name ?? ''}}</option>
                @foreach ($nationlitys as $nationlity)
                    <option value="{{ $nationlity->id ?? ''}}">{{ $nationlity->name ?? ''}}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <p>เชื้อชาติ</p>
            <select name="race" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]">
                <option value="{{ $employee->races->id ?? ''}}">{{ $employee->races->name ?? ''}}</option>
                @foreach ($races as $race)
                    <option value="{{ $race->id ?? ''}}">{{ $race->name ?? ''}}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <p>ศาสนา</p>
            <select name="religion" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]">
                <option value="{{ $employee->religions->id ?? ''}}">{{ $employee->religions->name ?? ''}}</option>
                @foreach ($religions as $religion)
                    <option value="{{ $religion->id ?? ''}}">{{ $religion->name ?? ''}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="text-[20px] py-[3px] text-text">
        <p>ข้อมูลทั่วไป</p>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p>ผ่านการเกณฑ์มาหรือยัง</p>
            <select name="typemilitary" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]">
                <option value="{{ $employee->typemilitarys->id ?? '' }}">
                    {{ $employee->typemilitarys->name ?? '' }}</option>
                @foreach ($typemilitarys as $typemilitary)
                    <option value="{{ $typemilitary->id ?? ''}}">{{ $typemilitary->name ?? ''}}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <p>ถ้ายังถึงกำหนดเมือไร</p>
            <input name="datemilitary" value="{{ $employee->militarys[0]->datemilitary ?? '' }}"
                type="text" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>ท่านมีใบขับขี่ประเภทใด</p>
            <select name="divingcard" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]">
                <option value="{{ $employee->divingcards->id ?? '' }}">{{ $employee->divingcards->name ?? '' }}
                </option>
                @foreach ($divingcards as $divingcard)
                    <option value="{{ $divingcard->id ?? ''}}">{{ $divingcard->name ?? ''}}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <p>สามารถขับขี่ยานพาหนะประเภท</p>
            <select name="cartype" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]">
                <option value="{{ $employee->cartypes->id ?? '' }}">{{ $employee->cartypes->name ?? '' }}
                </option>
                @foreach ($cartypes as $cartype)
                    <option value="{{ $cartype->id ?? ''}}">{{ $cartype->name ?? '' }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        
        <div class="">
            <p>วันอนุญาต</p>
            <input name="caryearstart" value="{{ $employee->agedivingcards[0]->yearstart ?? '' }}"
                type="date" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>วันสิ้นอายุ</p>
            <input name="caryearend" value="{{ $employee->agedivingcards[0]->yearend ?? '' }}" type="date"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>เคยมีส่วนในคดีอะไรบ้าง</p>
            <input name="case" value="{{ $employee->cases[0]->case ?? '' }}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>พร้อมจะปฏิบัติงานต่างจังหวัดหรือไม่</p>
            <select name="towork" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]">
                <option>{{ $employee->towork ?? ''}}</option>
                <option>ได้</option>
                <option>ไม่ได้</option>
            </select>
        </div>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        
        <div class="">
            <p>วัคซีนโควิคเข็ม1</p>
            <input name="vaccine1" value="{{ $employee->vaccines[0]->name1 ?? '' }}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>วัคซีนโควิคเข็ม2</p>
            <input name="vaccine2" value="{{ $employee->vaccines[0]->name2 ?? '' }}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>เคยสมัครงานที่นี้เมื่อวันที่</p>
            <input name="datejop" value="{{ $employee->jopps[0]->datejop ?? '' }}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>ท่านติดสารเสพติดหรือไม่</p>
            <input name="addicted" value="{{ $employee->addicteds[0]->name ?? '' }}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>เคยป่วยร้ายเเรงหรือเป็นโรคติดต่อหรือไม่</p>
            <input name="disease" value="{{ $employee->diseases[0]->name ?? '' }}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
    </div>
    <div class="text-[20px] py-[3px] text-text">
        <p>ข้อมูลการศึกษา</p>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p>ประเภทการศึกษาที่1</p>
            <select name="typeeducation" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]">
                <option value="{{ $employee->typeeducations->id ?? '' }}">
                    {{ $employee->typeeducations->name ?? '' }}
                </option>
                @foreach ($typeeducations as $typeeducation)
                    <option value="{{ $typeeducation->id ?? '' }}">{{ $typeeducation->name ?? ''}}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <p>ตั่งแต่ปี</p>
            <input name="yearstart" value="{{ $employee->educations[0]->yearstart ?? '' }}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>ถึงปี</p>
            <input name="yearend" value="{{ $employee->educations[0]->yearend ?? '' }}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>สถารศึกษา/ที่ตั่ง</p>
            <input name="location" value="{{ $employee->educations[0]->location ?? '' }}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>วุฒิที่ได้รับ</p>
            <input name="degree" value="{{ $employee->educations[0]->degree ?? '' }}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>เกรดเฉลี่ยรวม</p>
            <input name="gpa" value="{{ $employee->educations[0]->gpa ?? '' }}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>วิชาเอก</p>
            <input name="major" value="{{ $employee->educations[0]->major ?? '' }}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
    </div>
    <div class="text-[20px] py-[3px] text-text">
        <p>กรณีเร่งด่วน บุคคลที่สามารถติดต่อได้</p>
    </div>
    <div class="sm:grid sm:grid-cols-2 sm:gap-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:my-[1rem]">
        <div class="">
            <p>ชื่อ-นามสกุล</p>
            <input name="acquaintance" value="{{ $employee->acquaintances[0]->name ?? '' }}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>ที่อยู่</p>
            <input name="addressacquaintance" value="{{ $employee->acquaintances[0]->address ?? '' }}"
                type="text" class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>เบอร์โทร</p>
            <input name="telacquaintance" value="{{ $employee->acquaintances[0]->tel ?? '' }}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
        <div class="">
            <p>ความสัมพันธ์</p>
            <input name="relation" value="{{ $employee->acquaintances[0]->relation ?? '' }}" type="text"
                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
        </div>
    </div>
    <div class=" mt-10 w-11/12 mx-auto mb-8">
        <div class=" text-center">
            <div class=" ">
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
                    href="{{ url('/OutEmployees') }}">ยกเลิก</a>
            </div>
        </div>
    </div>
</form>

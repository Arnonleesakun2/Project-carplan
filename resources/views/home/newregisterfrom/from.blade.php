<form action="{{ url('/StoreNewEmployees') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="lg:grid lg:grid-cols-2">
        <div class="w-[100%] p-2 mx-auto space-y-4">
            <div class="rounded-[5px] border-solid border-[1px] border-[#DFDFDF] shadow-[1px_2px_6px_rgba(0,0,0,0.38)]">
                <div class="p-3 font-md text-[20px] bg-green-500 rounded-t-[5px]">
                    ข้อมูลสำคัญ
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="items-center">
                            <p>รูปภาพ:</p>
                            <input id="imageUpload" name="image" type="file"
                                class="h-[40px] file-input file-input-bordered  border-solid border-[1.5px] border-[#CED4DA] rounded-[8px] w-full"
                                accept=".png,.jpg,.jpeg" />
                        </div>
                    </div>
                    <div class="p-2">
                        <div class=" items-center">
                            <p>วันที่มาสมัคร:<span class=" font-semibold text-blue-800">(กรุณาเลือก)</span></p>
                            <input name="date" type="date" placeholder="วันเกิด"
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                required />
                        </div>
                    </div>

                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="items-center">
                            <p>เกิดวันที่:<span class="font-semibold text-blue-800">(กรุณาเลือก)</span></p>
                            <input name="brithday" type="date" placeholder="วันเกิด"
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" required/>
                     
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>คำนำหน้า<span class="font-semibold text-blue-800">(กรุณาเลือก)</span></p>
                            <select name="prefix"
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" required>
                                <option value="" disabled selected>เลือก</option>
                                @foreach ($prefixs as $prefix)
                                    <option value="{{ $prefix->id }}">{{ $prefix->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>ชื่อ-นามสกุล<span class="font-semibold text-blue-800">(กรุณากรอกข้อมูล)</span></p>
                            <input
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="name" type="text" placeholder="ชื่อ-นามสกุล"
                                class="input input-bordered w-full " required />
                          
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>ชื่อเล่น<span class="font-semibold text-blue-800">(กรุณากรอกข้อมูล)</span></p>
                            <input
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="nickname" type="text" placeholder="ชื่อเล่น"
                                class="input input-bordered w-full " required />
                           
                        </div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>ที่อยู่ปัจจุบัน<span class="font-semibold text-blue-800">(กรุณากรอกข้อมูล)</span></p>
                            <input
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="address" type="text" placeholder="ที่อยู่ปัจจุบัน"
                                class="input input-bordered w-full" required />
                          
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>ที่อยู่ตามบัตรประชาชน</p>
                            <input
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="cardaddress" type="text" placeholder="ที่อยู่ตามบัตรประชาชน"
                                class="input input-bordered w-full " />
                           
                        </div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>เบอร์โทร<span class="font-semibold text-blue-800">(กรุณากรอกข้อมูล)</span></p>
                            <input name="tel" type="number" placeholder="เบอร์โทร"
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                required />
                         
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>เลขประจำตัว 13 หลัก</p>
                            <input
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="idcard" type="number" placeholder="เลขประจำตัว 13 หลัก"
                                class="input input-bordered w-full " />
                           
                        </div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>เกิดที่จังหวัด</p>
                            <input
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="pobirth" type="text" placeholder="เกิดที่จังหวัด"
                                class="input input-bordered w-full " />
                          
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>อายุ</p>
                            <input name="age" type="number" placeholder="อายุ"
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
                           
                        </div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>สัญชาติ<span class="font-semibold text-blue-800">(กรุณาเลือก)</span></p>
                            <select name="nationlity"
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" required>
                                <option value="" disabled selected>เลือก</option>
                                @foreach ($nationlitys as $nationlity)
                                    <option value="{{ $nationlity->id }}">{{ $nationlity->name }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>ศาสนา<span class="font-semibold text-blue-800">(กรุณาเลือก)</span></p>
                            <select name="religion"
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" required>
                                <option value="" disabled selected>เลือก</option>
                                @foreach ($religions as $religion)
                                    <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                @endforeach
                            </select>
                           
                        </div>
                    </div>
                    
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>เชื้อชาติ<span class="font-semibold text-blue-800">(กรุณาเลือก)</span></p>
                            <select name="race"
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" required>
                                <option value="" disabled selected>เลือก</option>
                                @foreach ($races as $race)
                                    <option value="{{ $race->id }}">{{ $race->name }}</option>
                                @endforeach
                            </select>
                           
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>สถานะภาพ<span class="font-semibold text-blue-800">(กรุณาเลือก)</span></p>
                            <select name="psts"
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" required>
                                <option value="" disabled selected>เลือก</option>
                                @foreach ($psts as $pst)
                                    <option value="{{ $pst->id }}">{{ $pst->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>กำลังศึกษาอยู่กี่คน</p>
                            <input
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="stum" type="number" placeholder="กำลังศึกษาอยู่กี่คน"
                                class="input input-bordered w-full" />
                           
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>จำนวนบุตร</p>
                            <input
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="onchilden" type="number" placeholder="จำนวนบุตร"
                                class="input input-bordered w-full " />
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-[5px] border-solid border-[1px] border-[#DFDFDF] shadow-[1px_2px_6px_rgba(0,0,0,0.38)]">
                <div class="p-3 font-md text-[20px] bg-red-500 rounded-t-[5px]">
                    ข้อมูลการศึกษา
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>ประเภทการศึกษาที่1</p>
                            <select name="typeeducation"
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]">
                                <option disabled selected>เลือก</option>
                                @foreach ($typeeducations as $typeeducation)
                                    <option value="{{ $typeeducation->id }}">{{ $typeeducation->name }}</option>
                                @endforeach
                
                            </select>
                            
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>ตั่งแต่ปี</p>
                            <input class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="yearstart" type="number" placeholder="ตั่งแต่ปี" />
                           
                        </div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>ถึงปี</p>
                            <input class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="yearend" type="number" placeholder="ถึงปี" />
                           
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>ถารศึกษา/ที่ตั่ง</p>
                            <input class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="location" type="text" placeholder="สถารศึกษา/ที่ตั่ง" />
                            
                        </div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>วุฒิที่ได้รับ</p>
                            <input class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="degree" type="text" placeholder="วุฒิที่ได้รับ" />
                           
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>เกรดเฉลี่ยรวม</p>
                            <input class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="gpa" type="number" placeholder="เกรดเฉลี่ยรวม" />
                            
                        </div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>วิชาเอก</p>
                            <input class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="major" type="text" placeholder="วิชาเอก" />
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-[100%] p-2 mx-auto space-y-4">
            <div class="rounded-[5px] border-solid border-[1px] border-[#DFDFDF] shadow-[1px_2px_6px_rgba(0,0,0,0.38)]">
                <div class="p-3 font-md text-[20px] bg-blue-400 rounded-t-[5px]">
                    ข้อมูลอื่นๆ
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>ผ่านการเกณฑ์มาหรือยัง</p>
                            <select name="typemilitary"
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]">
                                <option disabled selected>เลือก</option>
                                @foreach ($typemilitarys as $typemilitary)
                                    <option value="{{ $typemilitary->id }}">{{ $typemilitary->name }}</option>
                                @endforeach
                            </select>
                          
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>ถ้ายังถึงกำหนดเมือไร</p>
                            <input class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="datemilitary" type="text" placeholder="ถ้ายังถึงกำหนดเมือไร" />
                           
                        </div>
                    </div>
    
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>ท่านมีใบขับขี่ประเภทใด</p>
                            <select name="divingcard"
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]">
                                <option disabled selected>เลือก</option>
                                @foreach ($divingcards as $divingcard)
                                    <option value="{{ $divingcard->id }}">{{ $divingcard->name }}</option>
                                @endforeach
                            </select>
                          
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>สามารถขับขี่ยานพาหนะประเภทใดบ้าง</p>
                            <select name="cartype"
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]">
                                <option disabled selected>เลือก</option>
                                @foreach ($cartypes as $cartype)
                                    <option value="{{ $cartype->id }}">{{ $cartype->name }}</option>
                                @endforeach
                            </select>
                           
                        </div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>วันอนุญาต</p>
                            <input name="caryearstart" type="date"
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px] " />
                          
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>วันสิ้นอายุ</p>
                            <input name="caryearend" type="date"
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
                            
                        </div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>เคยสมัครงานที่นี้ ถ้าเคยใส่วันที่ ถ้าไม่ก้ไม่ต้องกรอก</p>
                            <input name="datejop" type="date" placeholder=""
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" />
                            
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>ต้องการทำงานตำแหน่งอะไร<span class="font-semibold text-blue-800">(กรุณาเลือก)</span></p>
                            <select name="position"
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" required>
                                <option value="" disabled selected>เลือก</option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                                @endforeach
    
                            </select>
                            
                        </div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>ท่านเคยมีส่วนในคดีต่างๆหรือไม่<span
                                    class="font-semibold text-blue-800">(กรุณากรอกข้อมูล)</span></p>
                            <input class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="case" type="text" placeholder="ถ้าเคยกรุณาอธิบายถ้าไม่ก้ไม่ต้องกรอก" required/>
                            
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>พร้อมจะปฏิบัติงานต่างจังหวัดหรือไม่<span
                                    class="font-semibold text-blue-800">(กรุณากรอกข้อมูล)</span>
                            </p>
                            <select name="towork"
                                class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]" required>
                                <option value="" disabled selected>เลือก</option>
                                <option>ได้</option>
                                <option>ไม่ได้</option>
                            </select>
                            
                        </div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>วัคซีนโควิคเข็ม1<span class="font-semibold text-blue-800">(กรุณากรอกข้อมูล)</span></p>
                            <input class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="vaccine1" type="text" placeholder="วัคซีนโควิคเข็ม1" required />
                            
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>วัคซีนโควิคเข็ม2<span class="font-semibold text-blue-800">(กรุณากรอกข้อมูล)</span></p>
                            <input class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="vaccine2" type="text" placeholder="วัคซีนโควิคเข็ม2" required />
                           
                        </div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>เคยป่วยร้ายเเรงหรือเป็นโรคติดต่อหรือไม่</p>
                            <input class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="disease" type="text" placeholder="ถ้าเคยโปรดระบุชื่อโรคถ้าไม่ก้ไม่ต้่องกรอก" />
                            
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>ท่านติดสารเสพติดหรือไม่</p>
                            <input class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="addicted" type="text" placeholder="ถ้าเคยกรุณาอธิบายถ้าไม่ก้ไม่ต้่องกรอก" />
                            
                        </div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>เงินเดือนที่ต้องการ<span class="font-semibold text-blue-800">(กรุณากรอกข้อมูล)</span></p>
                            <input class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="needsalary" type="text" placeholder="วัคซีนโควิคเข็ม1" required />
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-[5px] border-solid border-[1px] border-[#DFDFDF] shadow-[1px_2px_6px_rgba(0,0,0,0.38)]">
                <div class="p-3 font-md text-[20px] bg-gray-600 rounded-t-[5px] text-white">
                    ข้อมูลบุคคลที่สามารถติดต่อได้
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>ชื่อ-นามสกุล<span class="font-semibold text-blue-800">(กรุณากรอกข้อมูล)</span></p>
                            <input class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="acquaintance" type="text" placeholder="ชื่อ-นามสกุล" required />
                           
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>ที่อยู่<span class="font-semibold text-blue-800">(กรุณากรอกข้อมูล)</span></p>
                            <input class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="addressacquaintance" type="text" placeholder="ที่อยู่" required />

                        </div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-2">
                    <div class="p-2">
                        <div class="">
                            <p>เบอร์โทร<span class="font-semibold text-blue-800">(กรุณากรอกข้อมูล)</span></p>
                            <input class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="telacquaintance" type="text" placeholder="เบอร์โทร" required />
                           
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="">
                            <p>ความสัมพันธ์<span class="font-semibold text-blue-800">(กรุณากรอกข้อมูล)</span></p>
                            <input class="input h-[40px] w-full border-solid border-[1.5px] border-[#CED4DA] rounded-[8px]"
                                name="relation" type="text" placeholder="ความสัมพันธ์" required />
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btnbox mt-10 w-11/12 mx-auto mb-8">
        <div class=" text-center">
            <div class="button">
                <label class="py-[7px] px-[21px] bg-[#111827] text-white cursor-pointer rounded-[10px] hover:bg-[#374151] duration-300" for="my_modal_6">บันทึก</label>
                <input type="checkbox" id="my_modal_6" class="modal-toggle" />
                <div class="modal" role="dialog">
                    <div class="modal-box">
                        <h3 class="font-bold text-lg">แน่ใจว่าจะบึนทึก</h3>
                        <p class="py-4">คลิกปุ่มยกเลิกเพื่อกลับ</p>
                        <div class="modal-action">
                            <button type="submit"
                                class="py-[7px] px-[21px] bg-[#111827] text-white cursor-pointer rounded-[10px] hover:bg-[#374151] duration-300">บันทึก</button>
                            <label for="my_modal_6"
                                class="py-[7px] px-[21px] bg-[#FF5861] text-white rounded-[10px] hover:bg-[#EF4C53] duration-300">ยกเลิก</label>
                        </div>
                    </div>
                </div>
                </dialog>
                <a class="py-[7px] px-[21px] bg-[#FF5861] text-white rounded-[10px] hover:bg-[#EF4C53] duration-300" href="{{ url('/') }}">ยกเลิก</a>
            </div>
        </div>
    </div>
</form>

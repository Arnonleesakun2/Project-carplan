<div class="w-[90%] mx-auto py-[50px]">
    <div class="p-6 bg-white rounded-xl border space-y-4 shadow-lg">
        <form id="main-form">
            @csrf
            <div class="space-y-[1rem]">
                <div class="space-y-[1rem] lg:grid lg:grid-cols-2 lg:w-full lg:gap-[1rem] lg:space-y-0">
                    <div class="">
                        <label
                            class="input input-bordered flex items-center gap-2 relative border-solid border-black border rounded-[8px]">
                            <div class="font-bold text-black">ลูกค้า :</div>
                            <select id="customer_id" class="grow text-black bg-transparent cursor-pointer" required>
                                <option value="" disabled selected>เลือก</option>
                                @foreach ($customers as $customer)
                                    <option class="text-black" value="{{ $customer->id }}">{{ $customer->customer }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="">
                        <label
                            class="input input-bordered flex items-center gap-2 border-solid border-black border rounded-[8px] relative">
                            <div class="font-bold text-black">ว/ด/ป :</div>
                            <input id="date" type="date" class="grow text-black appearance-none bg-transparent"
                                placeholder="Daisy" required/>
                            <!-- ไอคอน -->
                        </label>
                    </div>
                </div>
                <div class="space-y-[1rem] lg:grid lg:grid-cols-2 lg:w-full lg:gap-[1rem] lg:space-y-0">
                    <div class="space-y-[1rem]">
                        <div class="space-y-[1rem] lg:space-x-2 lg:grid lg:grid-cols-[70%,30%] lg:space-y-0">
                            <div class="">
                                <label
                                    class="input input-bordered flex items-center gap-2 border-solid border-black border rounded-[8px] relative">
                                    <div class="font-bold text-black">เส้นทาง :</div>
                                    <select id="select-road" class="grow text-black bg-transparent cursor-pointer"
                                        required>
                                        <option value="" disabled selected>เลือก</option>
                                        @foreach ($roads as $road)
                                            <option class="text-black" value="{{ $road->id }}"
                                                data-time="{{ $road->time }}">
                                                {{ $road->road }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="">
                                <label
                                    class="input input-bordered flex items-center gap-2 border-solid border-black border rounded-[8px] relative">
                                    <div class="font-bold text-black">เวลา :</div>
                                    <input id="roadtime" type="time"
                                        class="grow text-black appearance-none bg-transparent" readonly />
                                </label>
                            </div>
                        </div>
                        <div class="space-y-[1rem] lg:space-x-2 lg:grid lg:grid-cols-[40%,60%] lg:space-y-0">
                            <div class="">
                                <label
                                    class="input input-bordered flex items-center gap-2 border-solid border-black border rounded-[8px] relative">
                                    <div class="font-bold text-black">อุณหภูมิ :</div>
                                    <input id="temperature" type="number"
                                        class="grow text-black appearance-none bg-transparent w-[60%]" required />
                                </label>
                            </div>
                            <div class="">
                                <label
                                    class="input input-bordered flex items-center gap-2 border-solid border-black border rounded-[8px] relative">
                                    <div class="font-bold text-black">เลือกเที่ยว :</div>
                                    <select id="select-roadback" class="grow text-black bg-transparent cursor-pointer"
                                        required>
                                        <option value="" disabled selected>เลือก</option>
                                        <option class="text-black" value="ไปกลับเที่ยวเดียว">ไปกลับเที่ยวเดียว</option>
                                        <option class="text-black" value="ไปกลับมีสินค้า back hall">ไปกลับมีสินค้า back
                                            hall</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-[1rem]">
                        <div class="space-y-[1rem] lg:space-x-2 lg:grid lg:grid-cols-[65%,35%] lg:space-y-0">
                            <div class="">
                                <label
                                    class="input input-bordered flex items-center gap-2 bg-white border-solid border-black border rounded-[8px] relative">
                                    <div class="font-bold text-black">พนักงานขับรถ :</div>
                                    <select id="driver1_id" class="" required>
                                        <option value="-">-</option>
                                        @foreach ($drivers as $driver)
                                            <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="">
                                <label
                                    class="input input-bordered flex items-center gap-2 border-solid border-black border rounded-[8px]relative">
                                    <div class="font-bold text-black">เบี่ยเลี้ยง :</div>
                                    <select id="allowance1_id" class="grow text-black bg-transparent cursor-pointer"
                                        required>
                                        <option class="text-black" value="-">-</option>
                                        @foreach ($allowances as $allowance)
                                            <option class="text-black" value="{{ $allowance->id }}">
                                                {{ $allowance->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="space-y-[1rem] lg:space-x-2 lg:grid lg:grid-cols-[65%,35%] lg:space-y-0">
                            <div class="">
                                <label
                                    class="input input-bordered flex items-center gap-2 border-solid border-black border rounded-[8px] relative">
                                    <div class="font-bold text-black">พนักงานขับรถ2 :</div>
                                    <select id="driver2_id" class="" required>
                                        <option value="-">-</option>
                                        @foreach ($drivers as $driver)
                                            <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="">
                                <label
                                    class="input input-bordered flex items-center gap-2 border-solid border-black border rounded-[8px] relative">
                                    <div class="font-bold text-black">เบี่ยเลี้ยง :</div>
                                    <select id="allowance2_id" class="grow text-black bg-transparent cursor-pointer"
                                        required>
                                        <option class="text-black" value="-">-</option>
                                        @foreach ($allowances as $allowance)
                                            <option class="text-black" value="{{ $allowance->id }}">
                                                {{ $allowance->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="space-y-[1rem] lg:space-x-2 lg:grid lg:grid-cols-[65%,35%] lg:space-y-0">
                            <div class="">
                                <label
                                    class="input input-bordered flex items-center gap-2 border-solid border-black border rounded-[8px] relative">
                                    <div class="font-bold text-black">ผู้ช่วย :</div>
                                    <select id="assistant_driver_id" class="" required>
                                        <option value="-">-</option>
                                        @foreach ($driverassistants as $driverassistant)
                                            <option value="{{ $driverassistant->id }}">{{ $driverassistant->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="">
                                <label
                                    class="input input-bordered flex items-center gap-2 border-solid border-black border rounded-[8px] relative">
                                    <div class="font-bold text-black">เบี่ยเลี้ยง :</div>
                                    <select id="assistant_allowance_id"
                                        class="grow text-black bg-transparent cursor-pointer" required>
                                        <option class="text-black" value="-">-</option>
                                        @foreach ($allowances as $allowance)
                                            <option class="text-black" value="{{ $allowance->id }}">
                                                {{ $allowance->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:grid lg:grid-cols-2 lg:w-full lg:gap-[1rem]">
                    <div class="space-y-2">
                        <div class="p-3 bg-white border-solid border-black border rounded-[8px] space-y-4 shadow-lg">
                            <div class="flex justify-between items-center">
                                <p class="text-[25px] font-bold text-black">เพิ่มสินค้า</p>
                                <button type="button" id="add-product-btn" onclick="my_addproduct.showModal()"
                                    class="bg-gray-800 text-white hover:bg-gray-700 px-4 py-2 rounded-md transition"
                                    disabled>
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                            <div class="overflow-x-auto h-[200px] no-scrollbar">
                                <table id="product-table"
                                    class="w-full text-center border-separate border-spacing-y-2 ">
                                    <thead class="bg-gray-100 text-gray-700 sticky top-0 z-10">
                                        <tr class="text-center">
                                            <th class="px-4 py-3 rounded-l-[7px]">สาขา</th>
                                            <th class="px-4 py-3">สินค้า</th>
                                            <th class="px-4 py-3">น้ำหนัก</th>
                                            <th class="px-4 py-3 rounded-r-[7px]">ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody class="space-y-2">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="lg:space-x-3 lg:grid lg:grid-cols-3">
                            <div class="">
                                <p class="text-[20px] font-bold text-black">น้ำหนักสินค้า</br>
                                </p>
                                <input id="tatolweight"
                                    class="input border-solid border-black border rounded-[8px] h-[40px] w-full text-black appearance-none "
                                    type="text" readonly required />
                            </div>
                            <div class="">
                                <p class="text-[20px] font-bold text-black">จำนวนตะกร้า</p>
                                <input id="tatolbasket"
                                    class="input border-solid border-black border rounded-[8px] h-[40px] w-full text-black appearance-none "
                                    type="text" readonly required />
                            </div>
                            <div class="">
                                <p class="text-[20px] font-bold text-black">น้ำหนักรวมตะกร้า</p>
                                <input id="tatolweightbasket"
                                    class="input border-solid border-black border rounded-[8px] h-[40px] w-full text-black appearance-none "
                                    type="text" readonly required />
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="p-3 bg-white border-solid border-black border rounded-[8px] space-y-4 shadow-lg">
                            <div class="flex justify-between items-center">
                                <p class="text-[25px] font-bold text-black">เพิ่มค่าใช้จ่ายเพิ่มเติม</p>
                                <button type="button" onclick="my_Additionalcosts.showModal()"
                                    class="bg-gray-800 text-white hover:bg-gray-700 px-4 py-2 rounded-md transition">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                            <div class="overflow-x-auto h-[200px] no-scrollbar">
                                <table id="additionalcost-table"
                                    class="w-full text-center border-separate border-spacing-y-2">
                                    <thead class="bg-gray-100 text-gray-700 sticky top-0 z-10">
                                        <tr class="text-center">
                                            <th class="px-4 py-3 rounded-l-[7px]">รายการ</th>
                                            <th class="px-4 py-3">จำนวนเงิน</th>
                                            <th class="px-4 py-3 rounded-r-[7px]">ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody class="space-y-2">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-[1rem] lg:grid lg:grid-cols-4 lg:w-full lg:gap-[1rem] lg:space-y-0">
                    <div class="">
                        <label
                            class="input input-bordered flex items-center gap-2 border-solid border-black border rounded-[8px] relative">
                            <div class="font-bold text-black">เลือกเบอร์รถ :</div>
                            <select id="select-cars" class="grow text-black bg-transparent cursor-pointer" required>
                                <option value="" disabled selected>เลือก</option>
                                @foreach ($cars as $car)
                                    <option class="text-black" value="{{ $car->id }}"
                                        data-license="{{ $car->license }}" data-size="{{ $car->cartypes->name }}"
                                        data-weight="{{ $car->weight }}">
                                        {{ $car->number }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="">
                        <label
                            class="input input-bordered flex items-center gap-2 border-solid border-black border rounded-[8px] relative">
                            <div class="font-bold text-black">ทะเบียนรถ :</div>
                            <input id="license-input" type="text"
                                class="grow text-black appearance-none bg-transparent w-[50%]" readonly />
                        </label>
                    </div>
                    <div class="">
                        <label
                            class="input input-bordered flex items-center gap-2 border-solid border-black border rounded-[8px] relative">
                            <div class="font-bold text-black">ขนาด :</div>
                            <input id="size-input" type="text"
                                class="grow text-black appearance-none bg-transparent w-[50%]" readonly />
                        </label>
                    </div>
                    <div class="">
                        <label
                            class="input input-bordered flex items-center gap-2 border-solid border-black border rounded-[8px] relative">
                            <div class="font-bold text-black">ขนาด :</div>
                            <input id="weight-input" type="text"
                                class="grow text-black appearance-none bg-transparent w-[50%]" readonly />
                        </label>
                    </div>
                </div>
                <div class="mt-10 w-11/12 mx-auto mb-8">
                    <div class="text-center">
                        <button type="submit"
                            class="py-[7px] px-[21px] text-white bg-black cursor-pointer rounded-[10px] hover:bg-[#4A5568] hover:translate-x-1 duration-700">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

            </div>
            @include('planner.carplanners.addproduct._addproduct_modal'){{-- เพิ่มสินค้า --}}
            @include('planner.carplanners.additionalcosts._additionalcosts_modal'){{-- รายใช้จ่ายเพิ่มเติม --}}
        </form>
    </div>
</div>

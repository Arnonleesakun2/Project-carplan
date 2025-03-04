{{-- เส้นทาง --}}
<dialog id="my_road" class="modal">
    <div class="modal-box bg-white rounded-2xl shadow-custom">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-black hover:bg-black/40">✕
            </button>
        </form>
        <div class="">
            <h3 class="text-[20px] font-bold text-black">เพิ่มเส้นทาง</h3>
            <div class="pt-[20px]">
                <form id="form-road" class="space-y-2" action="">
                    <div class="space-y-2">
                        <input id="road" placeholder="เส้นทาง" name="road" value="" type="text"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            required />
                        <input id="time" placeholder="เวลา" name="time" value="" type="time"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            required />
                    </div>
                    <div class="">
                        <div class="h-[250px]" id="map"></div>
                        <input hidden id="lat" type="text" name="lat">
                        <input hidden id="lng" type="text" name="lng">
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


<dialog id="my_road_edit" class="modal">
    <div class="modal-box bg-white rounded-2xl shadow-custom">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-black hover:bg-black/40">✕
            </button>
        </form>
        <div class="">
            <h3 class="text-[20px] font-bold text-black">แก้ไขเส้นทาง</h3>
            <div class="pt-[20px]">
                <form id="form-editroad" class="space-y-2" action="">
                    <div class="space-y-2">
                        <input id="editidroad" name="id" value="" type="text"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            hidden />
                        <input id="editroad" name="road" value="" type="text"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            required />
                        <input id="edittime" name="time" value="" type="time"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            required />
                        <div class="">
                            <div id="editmap" class="h-[250px]"></div>
                        </div>
                        <div  class="">
                            <input hidden id="latedit" name="editlat" value="" type="text"
                            class=""
                            required />
                            <input hidden id="lngedit" name="editlng" value="" type="text"
                            class=""
                            required />
                        </div>
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


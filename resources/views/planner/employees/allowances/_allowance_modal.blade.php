{{-- เบี้ยเลี้ยง --}}
<dialog id="my_money" class="modal">
    <div class="modal-box bg-white rounded-2xl shadow-custom">
        <form method="dialog">
            <button
                class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-black hover:bg-black/40">✕
            </button>
        </form>
        <div class="">
            <h3 class="text-[20px] font-bold text-black">เพิ่มเบี้ยเลี้ยง</h3>
            <div class="pt-[20px]">
                <form id="form-allowance" class="space-y-2">
                    @csrf
                    <div class="flex item-center gap-2">
                        <input name="allowance" id="allowance" value="" type="number"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            placeholder="เบี้ยเลี้ยงเป็นตัวเลข"
                            required />
                        <div class="text-center">
                            <button type="submit"
                                class="py-[7px] px-[21px] text-white bg-black cursor-pointer rounded-[10px] hover:bg-[#4A5568] hover:translate-x-1 duration-700">
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    </div>
</dialog>

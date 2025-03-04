<!-- ภาค-->
<dialog id="my_sector" class="modal">
    <div class="modal-box bg-white rounded-2xl shadow-custom">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-black hover:bg-black/40">✕
            </button>
        </form>
        <div class="">
            <h3 class="text-[20px] font-bold text-black">เพิ่มภาค</h3>
            <div class="pt-[20px]">
                <form id="form-sector" class="space-y-2">
                    @csrf
                    <div class="flex gap-2 items-center">
                        <input id="sector" name="branch" type="text" placeholder="ภูมิถาค"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
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
</dialog>

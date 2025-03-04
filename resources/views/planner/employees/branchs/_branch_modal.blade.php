<!-- สาขา-->
<dialog id="my_branch" class="modal">
    <div class="modal-box bg-white rounded-2xl shadow-custom">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-black hover:bg-black/40">✕
            </button>
        </form>
        <div class="">
            <h3 class="text-[20px] font-bold text-black">เพิ่มสาขา</h3>
            <div class="max-w-[100%] mx-auto">
                <form id="form-branch" class="space-y-2">
                    @csrf
                    <div class="space-y-2">
                        <select id="branchcustomer"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            required>
                            <option value="" disabled selected>เลือกลูกค้า</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->customer }}</option>
                            @endforeach
                        </select>
                        <select id="branchsector"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            required>
                            <option value="" disabled selected>เลือกภาค</option>
                            @foreach ($sectors as $sector)
                                <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                            @endforeach
                        </select>
                        <input id="branchname" name="branch" type="text"
                            class="input h-[40px] w-full border-solid border-black border rounded-[8px]  text-black"
                            placeholder="สาขา" required />
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
</dialog>

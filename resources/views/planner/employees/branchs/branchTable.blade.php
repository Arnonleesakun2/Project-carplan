{{-- BranchTable --}}
<div class="p-6 bg-white rounded-xl border space-y-4 shadow-lg">
    <div class="flex justify-between items-center">
        <div class="flex items-center space-x-[20px]">
            <h3 class="text-xl font-bold uppercase tracking-wide text-gray-800">สาขา</h3>
            <select id="selectsector"
                class="input my-[5px] h-[30px] w-[40%] border-solid border-[1.5px] border-[#CED4DA] rounded-[8px] bg-transparent"
                required>
                <option class="text-black" value="" disabled selected>เลือกภาค</option>
                @foreach ($sectors as $sector)
                    <option value="{{ $sector->id }}" class="text-black">
                        {{ $sector->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button onclick="my_branch.showModal()"
            class="bg-gray-800 text-white hover:bg-gray-700 px-4 py-2 rounded-md transition">
            <i class="fa-solid fa-plus"></i>
        </button>
    </div>
    <div class="overflow-x-auto no-scrollbar max-h-[200px]">
        <table class="w-full text-center border-separate border-spacing-y-2" id="tablebranch">
            <thead class="bg-gray-100 text-gray-700 sticky top-0 z-10">
                <tr>
                    <th class="px-4 py-3 rounded-l-[7px]">ลูกค้า</th>
                    <th class="px-4 py-3">ภาค</th>
                    <th class="px-4 py-3">สาขา</th>
                    <th class="px-4 py-3 rounded-r-[7px]">ลบ</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
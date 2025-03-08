{{-- RoadTable --}}
<div class="p-6 bg-white rounded-xl border space-y-4 shadow-lg">
    <div class="flex justify-between items-center">
        <h3 class="text-xl font-bold uppercase tracking-wide text-gray-800">เส้นทาง</h3>
        <div class="">
            <a href="/RoadExportpdf" target="_blank">
                <button class="bg-gray-800 text-white hover:bg-gray-700 px-4 py-2 rounded-md transition">
                    <i class="fa-solid fa-file-pdf"></i>
                </button>
            </a>
            <button onclick="my_road.showModal()"
                class="bg-gray-800 text-white hover:bg-gray-700 px-4 py-2 rounded-md transition">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>

    </div>
    <div class="overflow-x-auto max-h-[400px] ">
        <table class="w-full text-center border-separate border-spacing-y-2" id="tableroad">
            <thead class="bg-gray-100 text-gray-700 sticky top-0 z-10">
                <tr>
                    <th class="px-4 py-3 rounded-l-[7px]">เส้นทาง</th>
                    <th class="px-4 py-3 ">เวลา</th>
                    <th class="px-4 py-3 ">สถานะ</th>
                    <th class="px-4 py-3 ">แก้ไข</th>
                    <th class="px-4 py-3 rounded-r-[7px]">ลบ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roads as $road)
                    <tr class="bg-white hover:bg-gray-50 text-gray-800 border-b">
                        <th class="px-4 py-1 rounded-l-[7px] border-l-[1px]">{{ $road->road }}</th>
                        <th class="px-4 py-1">{{ substr($road->time, 0, 5) }}</th>
                        <th class="px-4 py-1 flex justify-center items-center z-1 ">
                            <button
                                class="road-toggle-status w-8 h-8 flex items-center justify-center rounded-full shadow-lg transition-all duration-500 ease-in-out"
                                data-id="{{ $road->id }}" data-status="{{ $road->status }}"
                                style="background: {{ $road->status ? 'linear-gradient(135deg, #16A085, #1ABC9C)' : 'linear-gradient(135deg, #E74C3C, #C0392B)' }};">
                                <i
                                    class="fa-solid {{ $road->status ? 'fa-check' : 'fa-times' }} text-white text-lg transition-all duration-500 ease-in-out"></i>
                            </button>
                        </th>
                        <th class="px-4 py-1">
                            <button id="btneditroad" onclick="my_road_edit.showModal()" data-id="{{ $road->id }}"
                                data-road="{{ $road->road }}" data-time="{{ $road->time }}"
                                data-lat="{{ $road->lat }}" data-lng="{{ $road->lng }}">
                                <i class="fa-solid fa-pen-to-square hover:scale-125 duration-700"></i>
                            </button>
                        </th>
                        <th class="px-4 py-1 rounded-r-[7px] border-r-[1px]">
                            <a href="" data-id="{{ $road->id }}" id="roaddelete">
                                <i class="fa-solid fa-trash hover:scale-125 duration-700"></i>
                            </a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>PDF</title>
</head>

<body>
    <div class="min-h-screen bg-gray-100">
        <div class="bg-white rounded-lg p-6">
            <div class="w-[90%] mx-auto">
                <div class="flex justify-between items-center mb-4 border-b pb-2">
                    <h1 class="text-3xl font-semibold text-blue-900">รายงานข้อมูล</h1>
                    <p class="text-sm text-gray-600">วันที่: {{ $carplan->date ?? '' }}</p>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <h2 class="text-xl font-semibold text-blue-800">ข้อมูลลูกค้า</h2>
                            <p class="text-gray-700">ชื่อลูกค้า: {{ $carplan->customers->customer ?? '' }}</p>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-blue-800">ข้อมูลพนักงาน</h2>
                            <p class="text-gray-700">พนักงานขับรถ1: {{ $carplan->driver1->name ?? '-' }} เบี้ยเลี้ยง
                                {{ $carplan->allowance1->name ?? '-' }} บาท</p>
                            <p class="text-gray-700">พนักงานขับรถ2: {{ $carplan->driver2->name ?? '-' }} เบี้ยเลี้ยง
                                {{ $carplan->allowance2->name ?? '-' }} บาท</p>
                            <p class="text-gray-700">ผู้ช่วยพนักงานขับรถ: {{ $carplan->driverassistants->name ?? '-' }}
                                เบี้ยเลี้ยง {{ $carplan->assistantsallowance2->name ?? '-' }} บาท</p>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-blue-800">ข้อมูลอุณหภูมิ</h2>
                            <p class="text-gray-700">อุณหภูมิควบคุม: {{ $carplan->temperature ?? '' }} °C</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <h2 class="text-xl font-semibold text-blue-800">ข้อมูลเส้นทาง</h2>
                            <p class="text-gray-700">เส้นทางไปยังจังหวัด: {{ $carplan->roads->road ?? '' }}</p>
                            <p class="text-gray-700">เวลาออกเดินทาง:
                                {{ \Carbon\Carbon::parse($carplan->roads->time)->format('H:i') ?? '' }} น.</p>
                            <p class="text-gray-700">ชนิดการวิ่ง: {{ $carplan->routetype ?? '' }}</p>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-blue-800">ข้อมูลรถ</h2>
                            <p class="text-gray-700">เบอร์รถ: {{ $carplan->cars->number ?? '' }}</p>
                            <p class="text-gray-700">ทะเบียนรถ: {{ $carplan->cars->license ?? '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="w-full h-[200px] mt-4 rounded-md bg-gray-200" id="map"></div>
                <div class="mt-4">
                    <h2 class="text-xl font-semibold text-blue-800">ค่าใช้จ่ายเพิ่มเติม</h2>
                    <table class="w-full mt-2 border border-gray-300 rounded-lg overflow-hidden">
                        <thead class="bg-blue-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-700">รายการ</th>
                                <th class="px-4 py-2 text-left text-gray-700">ราคา</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $totalCost = 0; @endphp
                            @forelse ($caradditionalcost->Additionalcosts as $cost)
                                @php $totalCost += $cost->price; @endphp
                                <tr class="border-b border-gray-200">
                                    <td class="px-4 py-2 text-gray-700">{{ $cost->list ?? '' }}</td>
                                    <td class="px-4 py-2 text-gray-700">{{ $cost->price ?? '' }} บาท</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-4 py-2 text-center text-gray-700">ไม่มีข้อมูล</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-2 text-right font-semibold text-gray-900">ค่าใช้จ่ายเพิ่มเติมรวม:
                        {{ $totalCost ?? '' }} บาท</div>
                    @php $total = $totalallowance + $totalCost; @endphp
                    <div class="mt-1 text-right font-semibold text-gray-900">ค่าใช้จ่ายรวมทั้งหมด: {{ $total ?? '' }}
                        บาท</div>
                </div>
                <div class="mt-4">
                    <h2 class="text-xl font-semibold text-blue-800">รายการสินค้า</h2>
                    <table class="w-full mt-2 border border-gray-300 rounded-lg overflow-hidden">
                        <thead class="bg-blue-100">
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-700">สาขา</th>
                                <th class="px-4 py-2 text-left text-gray-700">ชื่อสินค้า</th>
                                <th class="px-4 py-2 text-left text-gray-700">น้ำหนัก</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carproduct->CarPlanProducts as $product)
                                <tr class="border-b border-gray-200">
                                    <td class="px-4 py-2 text-gray-700">{{ $product->Branchs->branch }}</td>
                                    <td class="px-4 py-2 text-gray-700">{{ $product->Products->product }}</td>
                                    <td class="px-4 py-2 text-gray-700">{{ $product->weightproduct }} กก.</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-end mt-2 font-semibold text-gray-900">จำนวนตะกร้า:
                        {{ $carplan->totalbasket ?? '' }} ตะกร้า</div>
                    <div class="flex justify-end mt-1 font-semibold text-gray-900">น้ำหนักสินค้า:
                        {{ $carplan->tatolweight ?? '' }} กิโลกรัม</div>
                    <div class="flex justify-end mt-1 font-semibold text-gray-900">น้ำหนักสินค้ารวมตะกร้า:
                        {{ $carplan->tatolweightbasket }} กิโลกรัม</div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        // ตรวจสอบค่าพิกัดจาก PHP ก่อนแทรกเข้า JavaScript
        var lat = parseFloat("{{ $carplan->roads->lat ?? 0 }}");
        var lng = parseFloat("{{ $carplan->roads->lng ?? 0 }}");

        // ตรวจสอบว่าพิกัดถูกต้องหรือไม่
        if (!isNaN(lat) && !isNaN(lng) && lat !== 0 && lng !== 0) {
            var map = L.map('map').setView([lat, lng], 7); // เริ่มแผนที่ที่ตำแหน่งพิกัดจาก PHP

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 30,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            var marker = L.marker([lat, lng]).addTo(map); // เพิ่มมาร์คเกอร์ที่พิกัด
        } else {
            console.error("ค่าพิกัดไม่ถูกต้องหรือไม่มีข้อมูลพิกัดจาก PHP");
        }
    </script>
</body>

</html>

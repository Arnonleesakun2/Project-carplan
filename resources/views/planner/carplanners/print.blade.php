<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PrintPlanner</title>
    @vite('resources/css/app.css')

</head>

<body>
    <div>
        <div style="text-align: right; font-size:11px;">
            <p>
                <span style="font-weight: bold;">เอกสารใบที่</span>&nbsp;<span>{{ $carplan->id }}</span> /
                <span>{{ $thaiyear }}</span>
            </p>
        </div>
        <div>
            <table style="font-size:11px; border-collapse: collapse; width: 100%;">
                <tr>
                    <td>
                        <span
                            style="font-weight: bold;">วันที่</span>&nbsp;<span>{{ $carplan->date }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">เส้นทาง</span>&nbsp;<span>{{ $carplan->roads->road }}</span>
                    </td>
                    <td style="text-align: right;">
                        <span
                            style="font-weight: bold;">ลูกค้า</span>&nbsp;<span>{{ $carplan->customers->customer }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span
                            style="font-weight: bold;">ทะเบียนรถ</span>&nbsp;<span>{{ $carplan->cars->license }}</span>
                    </td>
                </tr>
            </table>
        </div>
        <div>
            <table style="font-size:11px; border-collapse: collapse; width: 100%;">
                <tr>
                    <td style="vertical-align: top;">
                        <span
                            style="font-weight: bold;">เบอร์รถ</span>&nbsp;<span>{{ $carplan->cars->number }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span
                            style="font-weight: bold;">อุณหภูมิควบคุม</span>&nbsp;<span>{{ $carplan->temperature }}</span><span>°C</span>
                    </td>
                    <td style="text-align: right;">
                        <span
                            style="font-weight: bold;">เวลาออกเดินทาง</span>&nbsp;<span>{{ \Carbon\Carbon::parse($carplan->roads->time)->format('H:i') }}</span><span>น.</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;">การวิ่ง</span>&nbsp;<span>{{ $carplan->routetype }}</span>
                    </td>
                </tr>
            </table>
        </div>

        <div style="margin-top: 10px;">
            <table style="font-size:11px; border-collapse: collapse; width: 80%;">
                <tr>
                    <td style="vertical-align: top;">
                        <span style="font-weight: bold;">พนักงานขับรถ 1
                        </span>&nbsp;<span>{{ $carplan->driver1->name ?? '' }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    </td>
                    <td style="text-align: right;">
                        <span style="font-weight: bold;">เบี้ยเลี้ยง</span>&nbsp;<span
                            id="allowance1">{{ $carplan->allowance1->name ?? '' }}</span>&nbsp;<span>บาท</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    </td>
                </tr>
            </table>
        </div>
        <div style="">
            <table style="font-size:11px; border-collapse: collapse; width: 80%;">
                <tr>
                    <td style="vertical-align: top;">
                        <span style="font-weight: bold;">พนักงานขับรถ 2
                        </span>&nbsp;<span>{{ $carplan->driver2->name ?? '' }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    </td>
                    <td style="text-align: right;">
                        <span
                            style="font-weight: bold;">เบี้ยเลี้ยง</span>&nbsp;<span>{{ $carplan->allowance2->name ?? '' }}</span>&nbsp;<span>บาท</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    </td>
                </tr>
            </table>
        </div>
        <div style="">
            <table style="font-size:11px; border-collapse: collapse; width: 80%;">
                <tr>
                    <td style="vertical-align: top;">
                        <span
                            style="font-weight: bold;">เด็กรถ</span>&nbsp;<span>{{ $carplan->driverassistants->name ?? '' }}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    </td>
                    <td style="text-align: right;">
                        <span
                            style="font-weight: bold;">เบี้ยเลี้ยง</span>&nbsp;<span>{{ $carplan->assistantsallowance2->name ?? '' }}</span>&nbsp;<span>บาท</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    </td>
                </tr>
            </table>
        </div>
        <div style="">
            <table style="font-size:11px; border-collapse: collapse; width: 80%;">
                <tr>
                    <td style="vertical-align: top;">

                    </td>
                    <td style="text-align: right;">
                        <span
                            style="font-weight: bold;">รวมเบี้ยเลี้ยง</span>&nbsp;<span>{{ $totalallowance ?? '' }}</span>&nbsp;<span>บาท</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    </td>
                </tr>
            </table>
        </div>


        <div style="">
            <span style="font-weight: bold; font-size:11px;">ค่าใช้จ่ายเพิ่มเติม</span>
            <table style="font-size:11px; border-collapse: collapse; width: 80%;">
                <tr>
                    <td style="vertical-align: top;">

                    </td>
                    <td style="text-align: right;">
                        @php
                            $totalCost = 0; // ตัวแปรสะสมสำหรับค่าใช้จ่ายเพิ่มเติม
                        @endphp
                        <tbody>
                            @foreach ($caradditionalcost->Additionalcosts as $cost)
                                @php
                                    $totalCost += $cost->price; // เพิ่มค่าใช้จ่ายแต่ละรายการไปยังตัวแปรสะสม
                                @endphp
                                <tr class="text-center">
                                    <th>{{ $cost->list }}</th>
                                    <th style="margin-left:200px;">{{ $cost->price }} <span>บาท</span></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </td>
                </tr>
            </table>
        </div>
        <div style="">
            <table style="font-size:11px; border-collapse: collapse; width: 80%;">
                <tr>
                    <td style="vertical-align: top;">
                        <span style="font-weight: bold;">ค่าใช้จ่ายเพิ่มเติมรวม</span>

                    </td>
                    <td style="text-align: right;">
                        <span style="font-weight: bold;">{{ $totalCost }}</span>&nbsp;<span><span>บาท</span>

                    </td>
                </tr>
            </table>
        </div>
        <div style="">
            <table style="font-size:11px; border-collapse: collapse; width: 80%;">
                @php
                    $total = $totalallowance + $totalCost;
                @endphp
                <tr>
                    <td style="vertical-align: top;">
                        <span style="font-size:11px; font-weight: bold;">ค่าใช้จ่ายรวมทั้งหมด </span>

                    </td>
                    <td style="text-align: right;">
                        <span style="font-weight: bold;">{{ $total }}</span>&nbsp;<span><span>บาท</span>

                    </td>
                </tr>
            </table>
        </div>

        <h4 style="font-size:11px;">รายการสินค้า</h4>
        <div class="product" style="display: table; width: 100%; border-collapse: collapse; border: 1px solid black;">

            <table style="font-size:8px; width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="font-size:11px; border: 1px solid black; padding: 8px;">สาขา</th>
                        <th style="font-size:11px; border: 1px solid black; padding: 8px;">ชื่อสินค้า</th>
                        <th style="font-size:11px; border: 1px solid black; padding: 8px;">น้ำหนัก</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carproduct->CarPlanProducts as $product)
                        <tr>
                            <td style="font-size:11px; border: 1px solid black; padding: 8px;">
                                {{ $product->Branchs->branch }}</td>
                            <td style="font-size:11px; border: 1px solid black; padding: 8px;">
                                {{ $product->Products->product }}</td>
                            <td style="font-size:11px; border: 1px solid black; padding: 8px;">
                                {{ $product->weightproduct }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: right; width: 100%; margin-top:5px;">
            <table style="font-size:11px; border-collapse: collapse; width: 80%; margin-left: auto;">
                <tr>
                    <td style="text-align: right;">
                        <span
                            style="font-weight: bold;">จำนวนตะกร้า</span>&nbsp;<span>{{ $carplan->totalbasket }}</span>&nbsp;<span
                            style="font-weight: bold;">ตะกร้า</span>
                    </td>
                </tr>
            </table>
        </div>
        <div style="text-align: right; width: 100%; margin-top:5px;">
            <table style="font-size:11px; border-collapse: collapse; width: 80%; margin-left: auto;">
                <tr>
                    <td style="text-align: right;">
                        <span
                            style="font-weight: bold;">น้ำหนักสินค้า</span>&nbsp;<span>{{ $carplan->tatolweight }}</span>&nbsp;<span
                            style="font-weight: bold;">กิโลกรัม</span>
                    </td>
                </tr>
            </table>
        </div>
        <div style="text-align: right; width: 100%; margin-top:5px;">
            <table style="font-size:11px; border-collapse: collapse; width: 80%; margin-left: auto;">
                <tr>
                    <td style="text-align: right;">
                        <span
                            style="font-weight: bold;">น้ำหนักสินค้ารวมตะกร้า</span>&nbsp;<span>{{ $carplan->tatolweightbasket }}</span>&nbsp;<span
                            style="font-weight: bold;">กิโลกรัม</span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>

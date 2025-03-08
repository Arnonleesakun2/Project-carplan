<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <title>รายงานรถ</title>
    <style>
        body {
            font-family: "THSarabunNew", sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>รายงานรถ</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>เบอร์รถ</th>
                <th>ทะเบียนรถ</th>
                <th>ขนาดรถ</th>
                <th>น้ำหนักจำกัด(ก.ก)</th>
                <th>สถานะ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $key => $car)
                <tr>
                    <td>{{ $key + 1 ?? '' }}</td>
                    <td>{{ $car->number ?? '' }} </td>
                    <td>{{ $car->license ?? '' }}</td>
                    <td>{{ $car->weight ?? '' }}</td>
                    <td>{{ $car->cartypes->name ?? '' }}</td>
                    <td>
                        @if ($car->status == 1)
                            ใช้งานได้
                        @else
                            ใช้งานไม่ได้
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

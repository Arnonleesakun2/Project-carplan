<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <title>รายงานเส้นทาง</title>
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
    <h2>รายงานเส้นทาง</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>เส้นทาง</th>
                <th>เวลา</th>
                <th>สถานะ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roads as $key => $road)
                <tr>
                    <td>{{ $key + 1 ?? '' }}</td>
                    <th>{{ $road->road ?? '' }}</th>
                    <th>{{ substr($road->time, 0, 5) ?? '' }}</th>
                    <th>
                        @if ($road->status == 1)
                            ใช้งานได้
                        @else
                            ใช้งานไม่ได้
                        @endif
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

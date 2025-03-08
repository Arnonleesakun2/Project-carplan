<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <title>รายงานพนักงาน</title>
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
    <h2>รายงานพนักงาน</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>ชื่อ</th>
                <th>ชื่อเล่น</th>
                <th>เบอร์โทร</th>
                <th>ประเภทพนักงาน</th>
                <th>บริษัท</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $key => $employee)
                <tr>
                    <td>{{ $key + 1 ?? '' }}</td>
                    <th>{{ $employee->name ??''}}</th>
                    <th>{{ $employee->nickname ??''}}</th>
                    <th>{{ $employee->tel ??''}}</th>
                    <th>{{ $employee->positions->name ??''}}</th>
                    <th>{{ $employee->companys->name ??''}}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

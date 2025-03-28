<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <title>รายงานเบี้ยงเลี้ยง</title>
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
    <h2>รายงานเบี้ยงเลี้ยง</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>เบี้ยเลี้ยง</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allowances as $key => $allowance)
                <tr>
                    <td>{{ $key + 1 ?? '' }}</td>
                    <th>{{ $allowance->name ?? '' }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

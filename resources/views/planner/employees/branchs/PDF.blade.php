<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <title>รายงานสาขา</title>
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
    <h2>รายงานสาขา</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>ลูกค้า</th>
                <th>ภาค</th>
                <th>สาขา</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($branchs as $key => $branch)
                <tr>
                    <td>{{ $key + 1 ?? '' }}</td>
                    <th>{{ $branch->customers->customer ?? '' }}</th>
                    <th>{{ $branch->sectors->name ?? '' }}</th>
                    <th>{{ $branch->branch ?? '' }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <title>รายงานภาค</title>
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
    <h2>รายงานภาค</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>ภาค</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sectors as $key => $sector)
                <tr>
                    <td>{{ $key + 1 ?? '' }}</td>
                    <th>{{ $sector->name ?? '' }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

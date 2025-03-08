<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <title>รายงานสินค้า</title>
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
    <h2>รายงานสินค้า</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>ลูกค้า</th>
                <th>สินค้า</th>
                <th>น้ำหนักตะกร้า</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
                <tr>
                    <td>{{ $key + 1 ?? '' }}</td>
                    <th>{{ $product->customers->customer ??''}}</th>
                    <th>{{ $product->product ?? '' }}</th>
                    <th>{{ $product->weight ?? '' }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

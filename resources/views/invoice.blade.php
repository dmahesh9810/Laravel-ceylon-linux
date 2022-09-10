<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .table {
            margin-top: 200px;
            margin-left: 15px;
        }

        tr {
            padding: 40px;
            font-size: 15px
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 8px;
        }
    </style>
</head>

<body>


    <h1>Ceylon linux</h1>
    <div style="float: right;margin-right: 30px">
        <h3>INVOICE</h3>
        <label for="">{{ Carbon\Carbon::now()->timezone('Asia/Colombo') }}</label><br>
    </div>
    <div class="table">
        <table>
            <tr>
                <th>PO NUMBER</th>
                <th>SKU ID</th>
                <th>SKU CODE</th>
                <th>NAME</th>
                <th>MRP</th>
                <th>QTY</th>
                <th>UNIT PRICE</th>
                <th>TOTAL</th>
            </tr>
            @php
   $total =0;
    @endphp
            @foreach ($orders as $key => $name)
                @foreach ($name as $key => $value)
                    <tr>
                        <td>{{ $value->po_no }}</td>
                        <td>{{ $value->sku->sku_id }}</td>
                        <td>{{ $value->sku->code }}</td>
                        <td>{{ $value->sku->name }}</td>
                        <td>{{ $value->sku->mrp }}</td>
                        <td>{{ $value->qty }}</td>
                        <td class="">{{ $value->sku->distributor_price }}</td>
                        <td>{{$value->sku->distributor_price * $value->qty }}</td>
                        {{!! $total = $total + $value->sku->distributor_price * $value->qty !!}}
                    </tr>
                @endforeach
            @endforeach
            <br>




        </table>
        <label for="" style="float: right;margin-right: 25px">Total Balance =  {{$total}}</label>
    </div>

</body>

</html>

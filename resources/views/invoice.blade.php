<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($orders as $key => $name)
    @foreach ($name as $key => $value)

    <h4>Invoice : {{ $value->po_no }}</h4>
<label for="">Sku id : {{ $value->sku->sku_id }}</label><br>
<label for="">Sku code : {{ $value->sku->code }}</label><br>
<label for="">Name : {{ $value->sku->name }}</label><br>
<label for="">mrp : {{ $value->sku->mrp }}</label><br>
<label for="">Unit Price : {{ $value->sku->distributor_price }}</label><br>
<label for="">Unit Price : {{ $value->sku->distributor_price }}</label><br>
<label for="">QTY : {{ $value->qty }}</label><br>
<label for="">Date : {{ $value->date }}</label><br>
<label for="" class="bg-black-500 text-black">Total : {{ $value->qty * $value->sku->distributor_price }}</label><br><br>

    @endforeach
@endforeach
</body>
</html>


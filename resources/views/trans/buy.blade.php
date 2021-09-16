<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
</head>
<body>

<?php

use App\Http\Controllers\prodactscontroller;
$sum = prodactscontroller::total();
?>
total {{ $sum }}<br>
@foreach ($prodacts as $prodact)
name<br>
{{ $prodact->name; }}<br>
price<br>
{{ $prodact->price; }}

@endforeach
<form action="/ordernow" method="post">
@csrf

address
    <textarea name="address" id="" cols="30" rows="10"></textarea>
paymnt method<input type="radio" name="pymt" value="online" id="">
<input type="radio" name="pymt" value="chash" id="">
<button type="submit">order</button></form>

</body>
</html>

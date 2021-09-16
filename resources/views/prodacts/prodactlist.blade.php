@extends('layout/master')
@section('content')
<br>
<br>
  @foreach ($prodacts as $prodact )
  <a href="/addtocart/{{  $prodact['id'] }}">
    price<br>
<br>
    {{ $prodact['price'] }}
<br>

catagory<br>

    {{ $prodact['catagory'] }}
<br>

name<br>

    {{ $prodact['name'] }}

<br>
gallery<br>

    {{ $prodact['gallery'] }}
</a><br>
  @endforeach
  <br>
@endsection

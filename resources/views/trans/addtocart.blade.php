@extends('layout/master')
@section('content')
<br>
<br>
  @foreach ($prodacts as $prodact )
price{{ $prodact['price'] }}
<br>
{{ $prodact['name'] }}
  @if (session()->get('user'))
  <form action="/addtocart" method="post">
    @csrf
    <input type="text" name="prodact_id" id="" value={{ $prodact['id']}} hidden>
<button type="submit">add to cart</button></form>
@else
<br>
please sign in to buy
<br>
<a href="/login">login</a>

@endif

  @endforeach<br>
  <br>
@endsection

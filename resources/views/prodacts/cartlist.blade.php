@extends('master')
@section('content')
<form action="/ordernow" method="get">
    <button type="submit">order now</button>
</form>

  @foreach ($prodacts as $prodact )
{{ $prodact->catagory }}
  <a href="/addtocart/{{  $prodact->id }}">
  price  {{ $prodact->price }}
  {{ $prodact->name }}

</a>
  @endforeach
@endsection

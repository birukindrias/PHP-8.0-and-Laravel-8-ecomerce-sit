@extends('layout/master')
@section('content')
    <form action="/login" method="post">
@csrf

    <input type="text" name="email" id="">
    <input type="text" name="password" id="">
    role
    <input type="text" name="number" id="">

    <button type="submit">login</button>
    </form>
@endsection

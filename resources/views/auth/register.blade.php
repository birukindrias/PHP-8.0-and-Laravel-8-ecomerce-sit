@extends('layout/master')
@section('content')
    <form action="/register" method="post">
        @csrf
    <input type="text" name="name" id="">
    <input type="text" name="email" id="">
    <input type="text" name="password" id="">
    role
    <input type="text" name="role" id="">

    <button type="submit">register</button>

    </form>
@endsection

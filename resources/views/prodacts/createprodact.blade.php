@extends('layout/master')
@section('content')
  <form action="" method="post">
    @csrf
    <input type="text" name="name" id="">
    Name
      <input type="text" name="price" id="">
      <input type="file" name="gallery" id="">
      <input type="text" name="catagory" id="">
      <input type="text" name="description" id="">
      <button type="submit">add prodact</button>
  </form>
@endsection

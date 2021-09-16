home@php
use App\Http\Controllers\prodactscontroller;

    $total = prodactscontroller::carts();
@endphp
<a href="/">home</a>
@if (!session()->get('user'))
<a href="/register">register</a>
<a href="/login">login</a>
@endif
@if (session()->has('user'))
{{ session()->get('user')['name'] }}
<a href="/logout">logout</a>
<a href="/ordernow">cart({{ $total }})</a>
@else
@endif
<a href="/createprodact">create prodact</a>

<a href="/prodactlist">prodacts</a>


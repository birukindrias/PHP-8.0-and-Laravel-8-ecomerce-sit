<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usertcontroller;
use App\Http\Controllers\prodactscontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home');

Route::post('/login', [usertcontroller::class, 'login']);
Route::get('/login', function () {
    return view('auth/login');
});
Route::get('/logout', function () {
    session()->forget('user');

    return redirect('/login');
});
Route::post('/register', [usertcontroller::class, 'register']);
Route::view('/register', 'auth/register');
Route::get('/prodactlist', [prodactscontroller::class, 'prodactlist']);
Route::get('/addtocart/{id}', [prodactscontroller::class, 'addcart']);
Route::post('/addtocart', [prodactscontroller::class, 'addtocart']);
Route::post('/ordernow', [prodactscontroller::class, 'ordernow']);
Route::get('/ordernow', [prodactscontroller::class, 'ordernowcarts']);

Route::get('/cartes', [prodactscontroller::class, 'prodactlist'])->middleware('can:show-product');

/*
|create prodact
*/
Route::view('/createprodact', 'prodacts/createprodact');
Route::post('/createprodact', [prodactscontroller::class, 'createprodact']);

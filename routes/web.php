<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('front.pages.home.index');
});

Route::get('/contacto', function () {
    return view('front.pages.contact.index');
});

Route::get('/checkout', function () {
    return view('front.pages.checkout.index');
});

Route::get('/faqs', function () {
    return view('front.pages.faqs.index');
});

Route::get('/panel', function () {
    return view('admin.pages.panel.index');
});

Route::get('/purchase', function () {
    return view('front.pages.purchase.index');
});

Route::get('/ticket', function () {
    return view('front.pages.ticket.index');
});

Route::get('/tickets', function () {
    return view('front.pages.tickets.index');
});
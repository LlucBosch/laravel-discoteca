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
    return view('front.pages.home.desktop.home');
});

Route::get('/contacto', function () {
    return view('front.pages.contact.desktop.contact');
});

Route::get('/checkout', function () {
    return view('front.pages.checkout.desktop.checkout');
});

Route::get('/faqs', function () {
    return view('front.pages.faqs.desktop.faqs');
});

Route::get('/panel', function () {
    return view('admin.pages.panel.desktop.panel');
});

Route::get('/purchase', function () {
    return view('front.pages.purchase.desktop.purchase');
});

Route::get('/ticket', function () {
    return view('front.pages.ticket.desktop.ticket');
});

Route::get('/tickets', function () {
    return view('front.pages.tickets.desktop.tickets');
});
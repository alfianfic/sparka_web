<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', function () {
    return view('admin.user');
});
Route::get('/riwayat', function () {
    return view('admin.riwayat');
});
Route::get('/home', function () {
    return view('user.home');
});

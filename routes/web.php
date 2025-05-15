<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoryController;
Route::resource('/History', HistoryController::class);
use App\Http\Controllers\UserController;
Route::resource('/users', UserController::class);

Route::get('/', function () {
    return view('user.home');
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

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HistoryController;

Route::get('/', [UserController::class, 'home']);
Route::resource('/users', UserController::class);
// Route::get('/', function () {
//     return view('users');
// });
Route::get('/show', function () {
    return view('user.show');
});
Route::resource('/history', HistoryController::class);
Route::get('/riwayat', function () {
    return view('admin.riwayat');
});

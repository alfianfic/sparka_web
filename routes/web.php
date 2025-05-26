<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\AuthController;

// Route::get('/login', [AuthController::class, 'index']);
Route::get('/', [UserController::class, 'home'])->name('home');
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware'=>'auth'],function()
    {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('/users', UserController::class);
    Route::resource('/history', HistoryController::class);
    }
);

// Route::get('/show', function () {
//     return view('user.show');
// });

// Route::get('/riwayat', function () {
//     return view('admin.riwayat');
// });

// Route::get('/', function () {
//     return view('users');
// });

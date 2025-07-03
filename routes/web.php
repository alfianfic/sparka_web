<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\AuthController;

// Route::get('/login', [AuthController::class, 'index']);
Route::get('/', [UserController::class, 'home'])->name('home');
Route::post('/login', [AuthController::class, 'login']);

// Akses Admin (full akses)
Route::resource('/users', UserController::class)
    ->except(['show'])
    ->middleware(['auth', 'role:admin']);

Route::resource('/history', HistoryController::class)
    ->except(['show'])
    ->middleware(['auth', 'role:admin']);

// Akses User (hanya show)
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show')
    ->middleware(['auth', 'role:user,admin']);

Route::get('/history/{history}', [HistoryController::class, 'show'])->name('history.show')
->middleware(['auth', 'role:user,admin']);

Route::get('/history/data/{history}', [HistoryController::class, 'showGet']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Route::group(['middleware'=>'auth'],function()
//     {
//     Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//     Route::resource('/users', UserController::class)->middleware(['auth', 'role:admin']);
//     Route::resource('/history', HistoryController::class)->middleware(['auth', 'role:user']);
//     }
// );

// Route::get('/show', function () {
//     return view('user.show');
// });

// Route::get('/riwayat', function () {
//     return view('admin.riwayat');
// });

// Route::get('/', function () {
//     return view('users');
// });

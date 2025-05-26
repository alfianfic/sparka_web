<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User; 
use App\Http\Controllers\Api\HistoryController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FingerprintController;

Route::post('/login', [AuthController::class, 'login']);
Route::get('/finger/{id_fingerprint}', [FingerprintController::class, 'getFingerprintByUserId']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
});
Route::get('/testing', [HistoryController::class,'store']);
Route::
    middleware('auth:sanctum')->
    apiResource('/history', HistoryController::class);
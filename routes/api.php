<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User; 
use App\Http\Controllers\Api\HistoryController;
use App\Http\Controllers\Api\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::get('/testing', [HistoryController::class,'store']);
Route::
middleware('auth:sanctum')->
apiResource('/history', HistoryController::class);
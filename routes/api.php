<?php

use Illuminate\Support\Facades\Route;

//import controller ProductController
use App\Http\Controllers\Api\HistoryController;

//products
Route::get('/testing', [HistoryController::class,'store']);
Route::apiResource('/history', HistoryController::class);
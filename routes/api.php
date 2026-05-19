<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register',[App\Http\Controllers\Api\AuthController::class,'register']);
Route::post('/login',[App\Http\Controllers\Api\AuthController::class,'login']);


// HMI Endpoint
Route::post('/cp/update', [App\Http\Controllers\Api\ChargingPileController::class, 'update']);


// Website Endpoint
Route::get('/cp/view', [App\Http\Controllers\Api\DashboardController::class,'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


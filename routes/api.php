<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiOrderController;
use App\Http\Controllers\ApiPelangganController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// admin

Route::get('order', [ApiOrderController::class, 'index']);
Route::get('pelanggan', [ApiPelangganController::class, 'index']);
Route::post('create/pelanggan', [ApiPelangganController::class, 'store']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('pelanggan', ApiOrderController::class);



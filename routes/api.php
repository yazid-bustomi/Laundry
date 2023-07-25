<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PelangganController;


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
Route::get('order', [OrderController::class, 'index']);
Route::get('pelanggan', [PelangganController::class, 'index']);
Route::post('create/pelanggan', [PelangganController::class, 'store']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Models\Admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);


Auth::routes();

// Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('homeadm');
Route::get('/admin/pelanggan', [AdminController::class, 'create'])->name('pelanggan');
Route::get('/admin/tambahpelanggan', [AdminController::class, 'tambahPelanggan'])->name('tpelanggan');
Route::post('/admin/tambahpelanggan', [AdminController::class, 'store'])->name('spelanggan');
Route::get('/admin/order', [AdminController::class, 'listorder'])->name('listorder');
Route::get('/admin/order/{id}', [AdminController::class, 'aksi'])->name('aksi');

Route::get('/user', [UserController::class, 'index'])->name('homeusr');
Route::get('/order', [OrderController::class, 'create'])->name('order');
Route::post('/order', [OrderController::class, 'store'])->name('sorder');
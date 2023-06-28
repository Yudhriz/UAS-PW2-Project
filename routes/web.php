<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Admin
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/produk', [ProdukController::class, 'index']);
        Route::get('/kproduk', [KategoriProdukController::class, 'index']);
        Route::get('/pesanan', [PesananController::class, 'index']);
        Route::get('/pelanggan', [PelangganController::class, 'index']);
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

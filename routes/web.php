<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

//Admin
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->name('admin.')->group(function () {

//Admin produk
Route::get('/dashboard',[DashboardController::class, 'index']);
Route::get('/produk',[ProdukController::class, 'index']);
Route::get('/produk/createproduk', [ProdukController::class, 'create']);
Route::post('/produk/store', [ProdukController::class, 'store']);
Route::post('/produk/update', [ProdukController::class, 'update']);
Route::get('/produk/delete/{id}', [ProdukController::class, 'destroy']);
Route::get('/produk/viewproduk/{id}', [ProdukController::class, 'show'])->name('show');
Route::get('/produk/editproduk/{id}', [ProdukController::class, 'edit']);

//Admin kategori_produk
Route::get('/kproduk',[KategoriProdukController::class, 'index']);
Route::post('/kproduk/store',[KategoriProdukController::class, 'store']);
Route::post('/kproduk/update', [KategoriProdukController::class, 'update']);
Route::get('/kproduk/delete/{id}', [KategoriProdukController::class, 'destroy']);
Route::get('/kproduk/viewkproduk/{id}', [KategoriProdukController::class, 'show'])->name('show');
Route::get('/kproduk/createkproduk', [KategoriProdukController::class, 'create'])->name('create');
Route::get('/kproduk/editkproduk/{id}', [KategoriProdukController::class, 'edit'])->name('edit');

//Admin pesanan
Route::get('/pesanan',[PesananController::class, 'index']);

//Admin pelanggan
Route::get('/pelanggan',[PelangganController::class, 'index']);
    });
});

Auth::routes();

Route::get('/home',[HomeController::class, 'index'])->name('index');

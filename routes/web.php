<?php

use Illuminate\Support\Facades\Route;

// Controller untuk Backend
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PelangganController;

// Controller untuk Frontend
use App\Http\Controllers\SuntronicController;

// Controller untuk Auth
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

// Frontend
Route::get('/',[SuntronicController::class, 'index']);
Route::get('/products', [SuntronicController::class, 'loadMore'])->name('products.loadMore');

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
Route::post('/pesanan/store',[PesananController::class, 'store']);
Route::post('/pesanan/update', [PesananController::class, 'update']);
Route::get('/pesanan/delete/{id}', [PesananController::class, 'destroy']);
Route::get('/pesanan/viewpesanan/{id}', [PesananController::class, 'show'])->name('show');
Route::get('/pesanan/createpesanan', [PesananController::class, 'create'])->name('create');
Route::get('/pesanan/editpesanan/{id}', [PesananController::class, 'edit'])->name('edit');

//Admin pelanggan
Route::get('/pelanggan',[PelangganController::class, 'index']);
Route::post('/pelanggan/store',[PelangganController::class, 'store']);
Route::post('/pelanggan/update', [PelangganController::class, 'update']);
Route::get('/pelanggan/delete/{id}', [PelangganController::class, 'destroy']);
Route::get('/pelanggan/viewpelanggan/{id}', [PelangganController::class, 'show'])->name('show');
Route::get('/pelanggan/createpelanggan', [PelangganController::class, 'create'])->name('create');
Route::get('/pelanggan/editpelanggan/{id}', [PelangganController::class, 'edit'])->name('edit');
    });
});

Auth::routes();

Route::get('/admin/dashboard',[HomeController::class, 'index'])->name('index');

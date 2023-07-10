<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\Cart;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $perPage = 16;
        $page = $request->query('page', 1);

        $produk = Produk::take($perPage)->paginate($perPage, ['*'], 'page', $page);

        $user = Auth::user();
        if ($user) {
            $cart = Cart::where('user_id', $user->id)->get();
        } else {
            $cart = null; // Jika pengguna tidak terotentikasi, set keranjang menjadi null atau sesuai kebutuhan Anda
        }

        $dataTv = Produk::dataProdukTV();
        $datLaptop = Produk::dataProdukLaptop();
        $dataKulkas = Produk::dataProdukKulkas();

        $kategori = KategoriProduk::all();

        return view('index', [
            'produk' => $produk,
            'dataTv' => $dataTv,
            'dataLaptop' => $datLaptop,
            'dataKulkas' => $dataKulkas,
            'kategori_produk' => $kategori,
            'cart' => $cart,
        ]);
    }
}

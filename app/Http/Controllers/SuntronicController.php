<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\Cart;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class SuntronicController extends Controller
{
    /**
     * Display a listing of the resource.
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

    public function about(Request $request)
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

        return view('about', [
            'produk' => $produk,
            'cart' => $cart,
        ]);
    }
    public function contact(Request $request)
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

        return view('contact', [
            'produk' => $produk,
            'cart' => $cart,
        ]);
    }

    public function loadMore(Request $request)
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

        return view('load-more', [
            'produk' => $produk,
            'dataTv' => $dataTv,
            'dataLaptop' => $datLaptop,
            'dataKulkas' => $dataKulkas,
            'cart' => $cart,
            'kategori_produk' => $kategori
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produk = Produk::find($id);

        return view('modal.modal', ['produk' => $produk]);
    }

    public function cartShow(Request $request, $id)
    {
        $perPage = 16;
        $page = $request->query('page', 1);

        $produk = Produk::take($perPage)->paginate($perPage, ['*'], 'page', $page);

        $cart = Cart::where('user_id', $id)->get();

        return view('cart', [
            'cart' => $cart,
            'produk' => $produk,
        ]);
    }

    public function updateCart(Request $request)
    {
        $quantities = $request->input('quantity');

        if (!empty($quantities) && is_array($quantities)) {
            foreach ($quantities as $cartItemId => $quantity) {
                $cartItem = Cart::find($cartItemId);

                if ($cartItem) {
                    $cartItem->jumlah = $quantity;
                    $cartItem->save();
                }
            }
        }

        $user = Auth::user();

        return redirect('/cart/' . $user->id);
    }

    public function addToCart(Request $request)
    {
        $cart = new Cart();
        $cart->produk_id = $request->produk_id;
        $cart->jumlah = $request->jumlah;
        $cart->user_id = $request->user_id;
        $cart->save();

        return redirect('/');
    }

    public function addToPesanan(Request $request)
    {
        $tglPesanan = $request->input('tgl_pesanan');
        $alamat = $request->input('alamat');
        $userIds = $request->input('user_id');
        $quantity = $request->input('jumlah');
        $produkIds = $request->input('produk_id');
        $totalHarga = $request->input('total_harga');

        // Memastikan semua data yang diperlukan tersedia
        if ($tglPesanan && $alamat && $userIds && $produkIds && $totalHarga && $quantity) {
            // Menyiapkan array untuk menyimpan data pesanan
            $pesananData = [];

            // Menentukan jumlah pengulangan berdasarkan jumlah produk
            $jumlahProduk = count($produkIds);

            for ($i = 0; $i < $jumlahProduk; $i++) {
                // Mengambil data dari setiap iterasi dan menggabungkannya ke dalam array pesananData
                $pesananData[] = [
                    'total_harga' => $totalHarga[$i],
                    'tgl_pesanan' => $tglPesanan[$i],
                    'alamat' => $alamat[$i],
                    'jumlah' => $quantity[$i],
                    'user_id' => $userIds[$i],
                    'produk_id' => $produkIds[$i],
                ];
            }

            // Melakukan multiple insert ke dalam tabel pesanan
            Pesanan::insert($pesananData);

            // Redirect atau melakukan tindakan lainnya setelah operasi berhasil
            return redirect('/orders/success');
        }

        // Jika data yang diperlukan tidak lengkap, lakukan tindakan yang sesuai (misalnya, tampilkan pesan kesalahan)
        return redirect()->back()->with('error', 'Data is incomplete');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function checkoutSuccess(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $pesanan = Pesanan::where('user_id', $user->id)->get();
        } else {
            $pesanan = null; // Jika pengguna tidak terotentikasi, set keranjang menjadi null atau sesuai kebutuhan Anda
        }

        return view('checkout-success', [
            'pesanan' => $pesanan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

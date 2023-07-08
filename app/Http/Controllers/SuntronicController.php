<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\Cart;
use Illuminate\Http\Request;
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

        $cart = Cart::all();

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

        $cart = Cart::all();

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

        $cart = Cart::all();

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

        $cart = Cart::all();

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

    public function addToCart(Request $request)
    {
        $cart = new Cart();
        $cart->produk_id = $request->produk_id;
        $cart->jumlah = $request->jumlah;
        $cart->save();

        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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

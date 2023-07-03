<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class SuntronicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = 16;
        $page = $request->query('page',1);

        $produk = Produk::paginate($perpage, ['*'], 'page', $page);

        $new = new Produk();

        $dataTv = $new->dataProdukTV();
        $dataLaptop = $new->dataProdukLaptop();
        $dataKulkas = $new->dataProdukKulkas();

        $kategori = KategoriProduk::all();

        return view('index', ['produk' => $produk, 'dataTv' => $dataTv, 'dataLaptop' => $dataLaptop, 'dataKulkas' => $dataKulkas, 'kategori_produk' => $kategori]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

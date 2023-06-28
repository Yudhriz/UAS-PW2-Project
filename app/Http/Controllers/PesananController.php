<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Pesanan;
use Illuminate\support\facades\DB;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();

        $pesanan = DB::table('pesanan')
            ->join('produk', 'pesanan.produk_id', '=', 'produk.id')
            ->select('pesanan.*', 'produk.nama as nama_produk')
            ->get();
        //perintah join diatas untuk menggabungkan tabel pesanan dan produk
        return view('admin.produk.pesanan', compact('pesanan', 'produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori_produk = DB::table('kategori_produk')->get();
        $produk = DB::table('produk')->get();
        $pesanan = DB::table('pesanan')->get();
        return view('admin.produk.createpesanan', compact('kategori_produk', 'produk', 'pesanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pesanan = new Pesanan;
        $pesanan->pelanggan_id= $request->pelanggan_id;
        $pesanan->tgl_pesanan= $request->tgl_pesanan;
        $pesanan->produk_id= $request->produk_id;
        $pesanan->save();
        return redirect('pesanan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pesanan = DB::table('pesanan')->where('id', $id)->get();
        return view('admin.produk.viewpesanan',compact('pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pesanan = DB::table('pesanan')->where('id', $id)->get();
        return view('admin.produk.editpesanan', compact(
            'pesanan'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pesanan = Pesanan::find($request->id);
        $pesanan->pelanggan_id= $request->pelanggan_id;
        $pesanan->tgl_pesanan= $request->tgl_pesanan;
        $pesanan->produk_id= $request->produk_id;
        $pesanan->save();
        return redirect('pesanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('pesanan')->where('id', $id)->delete();
    }
}

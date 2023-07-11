<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = Pesanan::all();

        //perintah join diatas untuk menggabungkan tabel pesanan dan produk
        return view('admin.produk.pesanan', compact('pesanan'));
    }
    public function index2()
    {
        $pesanan = Pesanan::all();

        //perintah join diatas untuk menggabungkan tabel pesanan dan produk
        return view('admin.produk.pelanggan', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggan = DB::table('pelanggan')->get();
        $produk = DB::table('produk')->get();
        $pesanan = DB::table('pesanan')->get();
        return view('admin.produk.createpesanan', compact('pesanan', 'pelanggan', 'produk'));
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
        return redirect('/admin/pesanan');
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
        $pelanggan = DB::table('pelanggan')->get();
        $produk = DB::table('produk')->get();
        $pesanan = DB::table('pesanan')->where('id', $id)->get();
        return view('admin.produk.editpesanan', compact(
            'pesanan',
            'pelanggan',
            'produk'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $pesanan = Pesanan::find($request->id);
        $pesanan->pelanggan_id= $request->pelanggan_id;
        $pesanan->tgl_pesanan= $request->tgl_pesanan;
        $pesanan->produk_id= $request->produk_id;
        $pesanan->save();
        return redirect('/admin/pesanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('pesanan')->where('id', $id)->delete();
        return redirect('/admin/pesanan');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $produk = Produk::all();
        // $pesanan = Pesanan::all();
        $pelanggan = DB::table('pelanggan')
        ->select('pelanggan.*')
        ->get();
        return view('admin.produk.pelanggan',compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggan = DB::table('pelanggan')->get();
        return view('admin.produk.createpelanggan', compact('pelanggan'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pelanggan = new Pelanggan;
        $pelanggan->nama= $request->nama;
        $pelanggan->alamat= $request->alamat;
        $pelanggan->no_hp= $request->no_hp;
        $pelanggan->email= $request->email;
        $pelanggan->save();
        return redirect('/admin/pelanggan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pelanggan = DB::table('pelanggan')->where('id', $id)->get();
        return view('admin.produk.viewpelanggan', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pelanggan = DB::table('pelanggan')->where('id', $id)->get();
        return view('admin.produk.editpelanggan', compact(
            'pelanggan'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $pelanggan = Pelanggan::find($request->id);
        $pelanggan->nama= $request->nama;
        $pelanggan->alamat= $request->alamat;
        $pelanggan->no_hp= $request->no_hp;
        $pelanggan->email= $request->email;
        $pelanggan->save();
        return redirect('/admin/pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('pelanggan')->where('id', $id)->delete();
        return redirect('/admin/pelanggan');
    }
}

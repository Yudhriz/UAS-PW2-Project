<?php

namespace App\Http\Controllers;
use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //perintah ini menggunakan eloquent
         $kategori_produk = KategoriProduk::all();
         //perintah ini menggunakan query builder
         //$kategori_produk = DB::table('kategori_produk')->get();
         //untuk mengarahkan ke file produk
         $produk = DB::table('produk')
             ->join(
                 'kategori_produk',
                 'produk.kategori_produk_id',
                 '=',
                 'kategori_produk.id'
             )
             ->select('produk.*', 'kategori_produk.nama as nama_kategori')
             ->get();
         return view('admin.produk.produk', compact('produk'));
         return view('admin.produk.kproduk', compact('kategori_produk'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    $kategori_produk = DB::table('kategori_produk')->get();
    $produk = DB::table('produk')->get();
    if ($request->hasFile('foto_produk')) {
        $urlGambar = $this->uploadGambar($request);
    }
    return view('admin.produk.createproduk', compact('kategori_produk', 'produk'));
}

public function uploadGambar(Request $request)
{
    if ($request->hasFile('foto_produk')) {
        $file = $request->file('foto_produk');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $destinationPath = public_path('home/images');
        $file->move($destinationPath, $fileName);

        // Simpan nama file ke dalam database atau variabel lain jika diperlukan
        // contoh: $namaFile = $fileName;

        // Menggunakan asset() untuk menghasilkan URL gambar
        $url = asset('home/images/' . $fileName);

        // Kembalikan URL gambar sebagai respons atau gunakan sesuai kebutuhan Anda
        return $url;
    }

    // Kembalikan respon atau lakukan tindakan jika tidak ada file yang diunggah
    return response('Tidak ada file yang diunggah.', 400);
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produk = new Produk;
        $produk->nama = $request->nama;
        $produk->kategori_produk_id = $request->kategori_produk_id;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga= $request->harga;
        $produk->harga_diskon= $request->harga_diskon;
        $produk->stok= $request->stok;
        $produk->foto_produk= $request->foto_produk;
        $produk->save();
        return redirect('/admin/produk');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produk = DB::table('produk')->where('id', $id)->get();
        return view('admin.produk.viewproduk',compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori_produk = DB::table('kategori_produk')->get();
        $produk = DB::table('produk')->where('id', $id)->get();
        return view('admin.produk.editproduk', compact(
            'produk',
            'kategori_produk'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $produk = Produk::find($request->id);
        $produk->nama = $request->nama;
        $produk->kategori_produk_id = $request->kategori_produk_id;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga= $request->harga;
        $produk->harga_diskon= $request->harga_diskon;
        $produk->stok= $request->stok;
        $produk->foto_produk= $request->foto_produk;
        $produk->save();
        return redirect('/admin/produk');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('produk')->where('id', $id)->delete();
        return redirect('/admin/produk');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk extends Model
{
    use HasFactory;
    public $timestamps = false;
    //memanggil tabel yang akan dikelola
    protected $table = 'produk';
    //mendeklarasikan kolom yang ada di dalam tabel
    protected $fillable = [
        'nama',
        'kategori_produk_id',
        'deskripsi',
        'harga',
        'harga_diskon',
        'stok',
        'foto_produk',
    ];
    public function kategoriproduk()
    {
        return $this->belongsTo(KategoriProduk::class);
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function getAllData()
    {
        return DB::table('produk')
            ->join(
                'kategori_produk',
                'produk.kategori_produk_id',
                '=',
                'kategori_produk.id'
            )
            ->select('produk.*', 'kategori_produk.nama as nama')
            ->get();
    }

    public static function dataProdukTV()
    {
        return self::where('kategori_produk_id', 1)->limit(4)->get();
    }

    public static function dataProdukLaptop()
    {
        return self::where('kategori_produk_id', 2)->limit(4)->get();
    }

    public static function dataProdukKulkas()
    {
        return self::where('kategori_produk_id', 3)->limit(4)->get();
    }

    public function dataProdukID($id)
    {
        return Produk::find($id);
    }
}

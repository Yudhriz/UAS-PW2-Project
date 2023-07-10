<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pesanan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pesanan';
    protected $fillable = [
        'produk_id',
        'total_harga',
        'tgl_pesanan',
        'alamat',
        'jumlah',
        'user_id',
    ];
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAllData(){
        return DB::table('pesanan')
        ->join('pelanggan', 'pesanan.pelanggan_id', '=', 'pelanggan.id')
        ->join('produk', 'pesanan.produk_id', '=', 'produk.id')
        ->select('pesanan.*', 'produk.nama as nama_produk', 'pelanggan.nama as nama_pelanggan')
        ->get();
    }
}

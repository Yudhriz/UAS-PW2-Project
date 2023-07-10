<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;
    //memanggil tabel yang akan dikelola
    protected $table = 'cart';
    //mendeklarasikan kolom yang ada di dalam tabel
    protected $fillable = [
        'produk_id',
        'jumlah',
        'user_id',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}

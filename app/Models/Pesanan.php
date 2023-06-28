<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pesanan';
    protected $fillable = [
        'pelanggan_id',
        'tgl_pesanan',
        'produk_id',
    ];
    public function produk(){
        return $this->hasMany(Produk::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pelanggan';
    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'email',
    ];
    // // Relasi One-to-Many dengan Model Produk
    // public function produk()
    // {
    //     return $this->hasMany(Produk::class);
    // }
    // Relasi One-to-Many dengan Model Pesanan
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
}

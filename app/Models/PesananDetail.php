<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    protected $fillable = ['pesanan_id', 'produk_id', 'jumlah', 'jumlah_harga'];

    public function pesanan()
    {
        return $this->belongsTo(pesanan::class);
    }

    public function produk()
    {
        return $this->belongsTo(produk::class);
    }
}

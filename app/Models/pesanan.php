<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    protected $fillable = ['user_id', 'status', 'jumlah_harga'];

    public function pesananDetail()
    {
        return $this->hasMany(pesananDetail::class);
    }
    
}

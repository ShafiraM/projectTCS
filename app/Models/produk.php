<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class produk extends Model
{
    use HasFactory;

    public function getKategori(): BelongsTo
    {
        return $this->belongsTo(categoty::class, 'category_id', 'id');
    }

    public function getSeller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}


// <?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class produk extends Model
// {
//     use HasFactory;
// }

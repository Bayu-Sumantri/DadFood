<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = "pemesanans";

    protected $fillable = [
        "user_id",
        "id_makanan",
        "alamat_pengiriman",
        "total_pemesanan",
    ];

    public function pembayaran(): HasOne
    {
        return $this->HasOne(pembayaran::class, 'id_pemesanan');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class, 'id_makanan');
    }
}

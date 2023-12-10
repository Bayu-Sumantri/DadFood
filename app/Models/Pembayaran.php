<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = "pembayarans";

    protected $fillable = [
        "id_makanan",
        "id_pemesanan",
        "metode_pembayaran",
        "nomor_dana",
        "rekening_bank",
        "alamat_tujuan",
        "status",
    ];

    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class, 'id_makanan');
    }

    public function pemesanan(): BelongsTo
    {
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }
}

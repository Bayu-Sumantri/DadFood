<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = "pemesanans"; 

    protected $fillable = [
        "user_id",
        "id_makanan",
        "alamat_pengiriman",
        "status",
        "total_pemesanan",
    ];
}
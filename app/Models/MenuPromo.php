<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPromo extends Model
{
    use HasFactory;

    protected $table = "menu_promos"; 

    protected $fillable = [
        "nama_makanan",
        "gambar_makanan",
        "deskripsi_lengkap",
        "deskripsi_singkat",
        "harga_final",
        "harga_sebelumnya",
    ];
}
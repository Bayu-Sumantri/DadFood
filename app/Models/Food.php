<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Food extends Model
{
    use HasFactory;
    
    protected $table = "food"; 

    protected $fillable = [
        "nama_makanan",
        "gambar_makanan",
        "deskripsi_lengkap",
        "deskripsi_singkat",
        "harga",
    ];

            public function category(): HasOne
        {
            return $this->hasOne(Category::class, 'id_makanan');
        }

        
            public function pemesanan(): HasOne
        {
            return $this->hasOne(pemesanan::class, 'id_makanan');
        }


}
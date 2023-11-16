<?php

namespace App\Models;

use App\Models\Food;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories"; 

    protected $fillable = [
        "category",
        "id_makanan",
    ];

        public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class, 'id_makanan');
    }
}
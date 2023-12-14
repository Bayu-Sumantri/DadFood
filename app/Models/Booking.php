<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $table = "bookings";

    protected $fillable = [
        "name",
        "user_id",
        "email",
        "number_phone",
        "guests",
        "tanggal_reservasi",
        "table_name",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class, 'user_id');
    }
}

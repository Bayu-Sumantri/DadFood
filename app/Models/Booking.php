<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
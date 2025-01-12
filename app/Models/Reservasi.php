<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi'; // Sesuaikan dengan nama tabel di database

    protected $fillable = [
        'id_user',
        'id_kamar',
        'tgl_checkin',
        'tgl_checkout',
        'jumlah_kamar',
        'total_harga',
        'status',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'kamar';

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'tipe_kamar',
        'deskripsi',
        'kapasitas',
        'harga_permalam',
        'jumlah_kamar',
        'gambar'
    ];
}

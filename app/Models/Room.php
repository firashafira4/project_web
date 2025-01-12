<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    // Tentukan nama tabel jika berbeda dengan nama model dalam bentuk plural
    protected $table = 'kamar';

    // Tentukan kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'tipe_kamar', 'gambar', 'deskripsi', 'harga_permalam', 'kapasitas', 'jumlah_kamar'
    ];

    // Jika tidak menggunakan timestamp
    public $timestamps = false; // Setel ke 'false' jika tidak ada kolom created_at dan updated_at

}

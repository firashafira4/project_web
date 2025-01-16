<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'check_in',
        'check_out',
        'room_id',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}

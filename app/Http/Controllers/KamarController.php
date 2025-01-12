<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class KamarController extends Controller
{
     // Menampilkan semua data kamar
     public function index()
     {
         // Mengambil semua data kamar dari database
         $rooms = Room::all();  // Anda bisa menggunakan method lain seperti `Room::paginate()` untuk pagination
         return view('rooms.index', compact('rooms'));  // Kirim data ke view
     }
}

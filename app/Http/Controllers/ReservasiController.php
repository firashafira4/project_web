<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi; // Tambahkan model Reservasi
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function create(Kamar $room)
    {
        // Tampilkan form reservasi untuk kamar tertentu
        return view('reservations.create', compact('room'));
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'telepon' => 'required|string|max:20',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'room_id' => 'required|exists:rooms,id',
        ]);

        // Simpan data reservasi
        Reservasi::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('rooms.index')->with('success', 'Reservasi berhasil dibuat!');
        return redirect()->route('reservasi.create', ['room' => $roomId]);

    }
}

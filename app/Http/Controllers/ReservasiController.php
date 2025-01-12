<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi; // Tambahkan model Reservasi
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        // Mengambil semua data kamar dari tabel 'kamar'
        $kamar = Kamar::all();
        return view('reservasi.index', compact('kamar'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'id_user' => 'required|exists:users,id', // Asumsi user_id ada di form
            'id_kamar' => 'required|exists:kamar,id_kamar',
            'tgl_checkin' => 'required|date|after_or_equal:today',
            'tgl_checkout' => 'required|date|after:tgl_checkin',
            'jumlah_kamar' => 'required|integer|min:1',
            'total_harga' => 'required|numeric',
            'status' => 'required|string',
        ]);

        // Menghitung total harga jika belum dihitung
        $kamar = Kamar::findOrFail($validated['id_kamar']);
        $harga_permalam = $kamar->harga_permalam;
        $jumlah_hari = (strtotime($validated['tgl_checkout']) - strtotime($validated['tgl_checkin'])) / (60 * 60 * 24);
        $total_harga = $harga_permalam * $jumlah_hari * $validated['jumlah_kamar'];

        // Simpan data reservasi ke database
        Reservasi::create([
            'id_user' => $validated['id_user'],
            'id_kamar' => $validated['id_kamar'],
            'tgl_checkin' => $validated['tgl_checkin'],
            'tgl_checkout' => $validated['tgl_checkout'],
            'jumlah_kamar' => $validated['jumlah_kamar'],
            'total_harga' => $total_harga,
            'status' => $validated['status'],
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('reservasi.index')->with('success', 'Reservasi Anda berhasil!');
    }
}

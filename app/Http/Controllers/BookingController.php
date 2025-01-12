<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Menampilkan halaman daftar kamar
    public function showRooms()
    {
        $rooms = Kamar::all(); // Mendapatkan semua data kamar
        return view('rooms.index', compact('rooms'));
    }

    // Menampilkan form pemesanan untuk kamar tertentu
    public function bookRoomForm($id)
    {
        $room = Kamar::findOrFail($id);
        return view('booking.form', compact('room'));
    }

    // Menyimpan pemesanan
    public function storeBooking(Request $request)
    {
        $request->validate([
            'guest_name' => 'required|string|max:255',
            'email' => 'required|email',
            'tgl_checkin' => 'required|date',
            'tgl_checkout' => 'required|date',
            'jumlah_kamar' => 'required|integer|min:1',
            'payment_method' => 'required|string',
            'payment_date' => 'required|date',
            'payment_status' => 'required|string',
        ]);

        // Menghitung total harga berdasarkan harga kamar dan jumlah kamar
        $room = Kamar::findOrFail($request->room_id);
        $total_harga = $room->harga_permalam * $request->jumlah_kamar;

        // Menyimpan data reservasi ke tabel reservasi
        $reservasi = new Reservasi([
            'id_user' => Auth::id(),
            'id_kamar' => $request->room_id,
            'tgl_checkin' => $request->tgl_checkin,
            'tgl_checkout' => $request->tgl_checkout,
            'jumlah_kamar' => $request->jumlah_kamar,
            'total_harga' => $total_harga,
            'status' => 'pending',
        ]);

        $reservasi->save();

        // Redirect ke halaman konfirmasi pembayaran atau halaman lain
        return redirect()->route('booking.confirmation', ['id' => $reservasi->id_reservasi]);
    }

    // Halaman konfirmasi
    public function showConfirmation($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        return view('booking.confirmation', compact('reservasi'));
    }
}

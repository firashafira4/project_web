<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    // Fungsi untuk menampilkan form upload gambar
    public function showForm()
    {
        return view('upload');
    }

    // Fungsi untuk menangani upload gambar
    public function uploadImage(Request $request)
    {
        // Validasi file gambar
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Ambil file gambar
        $image = $request->file('image');

        // Simpan file ke dalam folder public dan dapat diakses melalui URL
        $imagePath = $image->store('images', 'public');  // Menyimpan di storage/app/public/images

        // Menyimpan path gambar ke database atau menggunakannya dalam aplikasi
        // Contoh: Menyimpan path gambar ke session atau variabel
        return back()->with('success', 'Gambar berhasil diupload!')
                     ->with('image', $imagePath);
}
}

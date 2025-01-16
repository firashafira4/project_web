<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;


class PhotoController extends Controller
{
    public function index()
    {
        // Ambil semua data foto dari database
        $photos = Photo::all();

        // Kirim data ke view
        return view('photos.index', compact('photos'));
}

}

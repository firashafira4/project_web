<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // Mengambil semua data pengalaman tamu dari tabel 'experiences'
        $experiences = Experience::all();

        // Mengirim data pengalaman tamu ke view 'blog.index'
        return view('blog.index', compact('experiences'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        // Data fasilitas hardcoded
        $facilities = [
            [
                'name' => 'Garden',
                'image' => 'taman.jpg',
                'description' => 'Di tengah hotel mewah kami, terdapat sebuah taman unik dengan sentuhan kehangatan alami yang memanjakan mata. Taman ini didominasi oleh elemen kayu berwarna cokelat...',
            ],
            [
                'name' => 'Restaurant',
                'image' => 'restoran.jpg',
                'description' => 'Restoran di hotel kami dirancang dengan nuansa coklat yang hangat dan elegan, menciptakan atmosfer yang nyaman dan menenangkan bagi setiap pengunjung...',
            ],
            [
                'name' => 'Swimming Pool',
                'image' => 'keong.jpg',
                'description' => 'Kolam renang di hotel kami memiliki desain unik dengan ciri khas berbentuk keong yang memikat, menciptakan pengalaman berenang yang berbeda dari biasanya...',
            ],
            // Tambahkan fasilitas lainnya sesuai kebutuhan
        ];

        return view('facilities.index', compact('facilities'));
    }
}

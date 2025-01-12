<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Hotel</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #6B4F4F;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 2em;
        }

        .container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .box {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .box img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .box h2 {
            color: #6B4F4F;
            font-size: 1.8em;
            margin-bottom: 10px;
        }

        .box p {
            font-size: 1em;
            line-height: 1.6;
        }

        .carousel-item img {
            max-height: 400px;
            width: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .experience-form {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .experience-form input,
        .experience-form textarea,
        .experience-form button {
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .experience-form button {
            background-color: #6B4F4F;
            color: white;
            cursor: pointer;
        }

        .experience-form button:hover {
            background-color: #5A3D3D;
        }

        .carousel-inner {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: scroll;
            padding-bottom: 15px;
        }

        .carousel-item {
            flex: 0 0 auto;
            margin-right: 15px;
            text-align: center;
        }

        .carousel-indicators {
            bottom: -40px;
        }

        .carousel-control-prev-icon, .carousel-control-next-icon {
            background-color: #6B4F4F;
        }

        ul {
            padding-left: 20px;
            list-style-type: disc;
        }

        li {
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            header {
                font-size: 1.5em;
            }

            .box {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Selamat Datang di Blog Hotel Kami</h1>
    </header>

    <div class="container">
        <!-- Sejarah Hotel -->
        <div class="box">
            <h2>Sejarah Hotel</h2>
            <img src="images/hotel-history.jpg" alt="Sejarah Hotel">
            <p>Hotel kami didirikan pada bulan November 2023 dengan visi untuk menghadirkan pengalaman menginap yang nyaman dan berkesan bagi setiap tamu. Berlokasi strategis di tengah kota, hotel ini dirancang untuk memenuhi kebutuhan wisatawan bisnis maupun keluarga yang mencari tempat istirahat yang modern dan berkualitas...</p>
        </div>

        <!-- Destinasi di Sekitar Hotel -->
        <div class="box">
            <h2>Destinasi di Sekitar Hotel</h2>
            <div id="destinasiCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="slide-content">
                            <img src="images/destination1.jpg" alt="Rute Perjalanan">
                            <h3>Rute Perjalanan</h3>
                            <p>Hanya 15 menit dari bandara utama, akses mudah dengan transportasi umum.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="slide-content">
                            <img src="images/destination2.jpg" alt="Wisata Kuliner">
                            <h3>Wisata Kuliner</h3>
                            <p>Rasakan masakan lokal terbaik di sekitar hotel, mulai dari makanan tradisional hingga street food.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="slide-content">
                            <img src="images/destination3.jpg" alt="Wisata Populer">
                            <h3>Wisata Populer</h3>
                            <p>Kunjungi destinasi wisata terdekat seperti pantai dan taman kota.</p>
                        </div>
                    </div>
        </div>

        <!-- Promosi dan Diskon -->
        <div class="box">
            <h2>Promosi dan Diskon</h2>
            <img src="images/promo.jpg" alt="Promosi Hotel">
            <p>1. Promosi Paket Menginap</p>
            <p>2. Promosi Restoran</p>
            <p>3. Promosi Akhir Pekan</p>
            <p>4. Promosi Event dan MICE</p>
            <p>5. Promosi Loyalty Program</p>
        </div>

        <!-- Panduan Pemesanan -->
        <div class="box">
            <h2>Panduan Pemesanan</h2>
            <p>Ikuti langkah-langkah berikut untuk memesan kamar atau menikmati santapan di restoran kami...</p>
        </div>

        <!-- Peraturan Hotel -->
        <div class="box">
            <h2>Peraturan Hotel</h2>
            <ul>
                <li>Check-in dan Check-out</li>
                <li>Pembayaran</li>
                <li>Keamanan</li>
                <li>Kebijakan Merokok</li>
                <li>Kebijakan Hewan Peliharaan</li>
                <li>Kebersihan dan Keteraturan</li>
                <li>Penggunaan Fasilitas</li>
                <li>Kebijakan Bising</li>
                <li>Pembatalan dan Perubahan Pemesanan</li>
            </ul>
        </div>

        <!-- Cerita Pengalaman dari Tamu -->
        <div class="box">
            <h2>Cerita Pengalaman Tamu</h2>
            <div>
                <!-- PHP script for displaying guest experiences -->
            </div>

            <form class="experience-form" method="POST" action="experiences">
                <h3>Bagikan Pengalaman Anda</h3>
                <input type="text" name="name" placeholder="Nama Anda" required>
                <textarea name="message" rows="4" placeholder="Ceritakan pengalaman Anda di hotel kami..." required></textarea>
                <button type="submit">Kirim</button>
            </form>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Master - Facilities</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background-color: #f4f6f9;
    color: #333;
    line-height: 1.6;
}

a {
    text-decoration: none;
    color: inherit;
}

h1, h2, h3, p {
    margin: 0;
    padding: 0;
}

p {
    text-align: justify; /* Menjaga paragraf agar rata kanan kiri */
    margin-bottom: 20px;
}

/* Navbar */
nav {
    background-color: rgb(24, 42, 61);
    padding: 15px 0;
}

nav ul {
    display: flex;
    justify-content: center;
    list-style: none;
    padding: 0;
}

nav ul li {
    margin: 0 25px;
}

nav ul li a {
    color: white;
    font-weight: 600;
    padding: 10px 20px;
    text-transform: uppercase;
    font-size: 1rem;
    transition: 0.3s ease;
}

nav ul li a:hover {
    background-color:rgb(24, 42, 61);
    border-radius: 5px;
}

/* Hero Section */
.hero {
    background: url('Hyatt Regency Malta Opens.jpg') no-repeat center center/cover;
    height: 60vh;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    background-position: center;
}

.hero h1 {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 20px;
}

.hero p {
    font-size: 1.2rem;
}

/* Facilities Section */
.facilities-section {
    padding: 60px 20px;
}

.facilities-section h2 {
    font-size: 2.5rem;
    font-weight: 600;
    text-align: center;
    margin-bottom: 40px;
    color: #35424a;
}

.facility-cards {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 40px;
    justify-items: center;
    margin: 0 20px;
}

.facility-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: 0.3s ease;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    width: 400px;
    height: 500px;
}

.facility-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.facility-card img {
    width: 100%;
    height: 300px;
    object-fit: cover;
}

.facility-card h3 {
    font-size: 1.8rem;
    font-weight: 600;
    padding: 15px;
    background-color: #f4f6f9;
    width: 100%;
    text-align: center;
}

.facility-card p {
    padding: 0 20px;
    font-size: 1rem;
    line-height: 1.5;
    color: #666;
}

/* Button */
.learn-more {
    background-color: rgb(24, 42, 61);
    color: white;
    padding: 10px 20px;
    border: none;
    width: 100%;
    text-align: center;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
    border-radius: 5px; /* Rounding button corners */
}

.learn-more:hover {
    background-color: rgb(34, 60, 88); /* Slightly lighter shade */
}

footer {
    background: rgb(24, 42, 61);
    color: white;
    padding: 20px; /* Tambahkan padding untuk jarak yang lebih nyaman */
    display: flex;
    justify-content: center; /* Menengahkan secara horizontal */
    align-items: center; /* Menengahkan secara vertikal */
    text-align: center;
    font-size: 0.9rem; /* Sesuaikan ukuran teks */
}

footer p {
    margin: 0;
    font-size: 0.9rem;
}

/* Modal */
#facilityModal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.6);
    justify-content: center;
    align-items: center;
}

#facilityModal div {
    background: white;
    padding: 30px;
    border-radius: 10px;
    width: 70%;
    max-width: 900px;
    text-align: center;
    transition: transform 0.3s ease;
}

#facilityModal img {
    width: 100%;
    border-radius: 10px;
    margin-bottom: 20px;
}

/* Modal close button */
button {
    background-color: #f44336;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    font-size: 1rem;
}

button:hover {
    background-color: #d32f2f;
}


    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="views">Home</a></li>
            <li><a href="rooms">Rooms</a></li>
            <li><a href="reservasi">Reservation</a></li>
            <li><a href="facilities">Facilities</a></li>
            <li><a href="blog">Blog</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Hotel Celestia Royale Facilities</h1>
        <p>Experience the best services and amenities for your perfect stay</p>
    </section>

    <!-- Facilities Section -->
    <section class="facilities-section">
        <h2>Our Facilities</h2>

        <div class="facility-cards">
            <!-- Facility 1 -->
            <div class="facility-card">
                <img src="taman.jpg" alt="Garden">
                <h3>Garden</h3>
                <button class="learn-more" onclick="openModal('Garden', 'Di tengah hotel mewah kami, terdapat sebuah taman unik dengan sentuhan kehangatan alami yang memanjakan mata. Taman ini didominasi oleh elemen kayu berwarna cokelat, menciptakan suasana yang hangat dan bersahaja sekaligus elegan. Jalan setapak dari kayu yang tertata rapi menghubungkan berbagai sudut taman, mengundang tamu untuk menjelajahi ruang-ruang yang dirancang dengan hati-hati. Bangku kayu yang artistik, gazebo dengan detail ukiran, dan pergola yang dihiasi tanaman merambat menjadi titik fokus yang menambah pesona. Pot kayu dengan tanaman hijau segar dan lampu taman bergaya rustic memperkuat nuansa alami dan harmoni. Taman ini adalah tempat yang sempurna untuk bersantai, membaca buku, atau menikmati momen tenang di bawah naungan pohon dengan sentuhan keindahan klasik yang memikat')">Selengkapnya</button>
            </div>

            <!-- Facility 2 -->
            <div class="facility-card">
                <img src="restorant.jpg" alt="Restaurant">
                <h3>Restaurant</h3>
                <button class="learn-more" onclick="openModal('Restaurant', 'Restoran di hotel kami dirancang dengan nuansa coklat yang hangat dan elegan, menciptakan atmosfer yang nyaman dan menenangkan bagi setiap pengunjung. Dengan pencahayaan lembut yang memantulkan kehangatan kayu coklat pada furnitur dan dinding, restoran ini menjadi tempat yang sempurna untuk menikmati hidangan berkualitas tinggi. Nuansa coklat yang mendominasi, dipadukan dengan aksen-aksen elegan, memberikan kesan mewah namun tetap bersahaja. Baik untuk santap siang santai, makan malam romantis, maupun acara bisnis, restoran kami siap memberikan pengalaman bersantap yang memuaskan dalam suasana yang penuh kenyamanan dan gaya.')">Selengkapnya</button>
            </div>

            <!-- Facility 3 -->
            <div class="facility-card">
                <img src="keong.jpg" alt="Swimming Pool">
                <h3>Swimming Pool</h3>
                <button class="learn-more" onclick="openModal('Swimming Pool', 'Kolam renang di hotel kami memiliki desain unik dengan ciri khas berbentuk keong yang memikat, menciptakan pengalaman berenang yang berbeda dari biasanya. Dengan bentuk spiral yang elegan, kolam ini mengundang pengunjung untuk menikmati suasana yang tenang dan menenangkan, seolah meluncur dalam bentuk keong yang melambangkan kelancaran dan keindahan alami. Dikelilingi pemandangan hijau dan suasana yang asri, kolam renang ini menawarkan lebih dari sekadar tempat untuk berenang, tetapi juga sebuah ruang untuk relaksasi dan penyegaran yang sempurna.')">Selengkapnya</button>
            </div>
            <div class="facility-card">
                <img src="gym.jpg" alt="Swimming Pool">
                <h3>Gym</h3>
                <button class="learn-more" onclick="openModal('Gym', 'Gym yang dirancang dengan perpaduan nuansa hitam dan coklat yang modern dan energik, menciptakan atmosfer yang sempurna untuk berolahraga. Dinding dengan aksen coklat hangat berpadu dengan peralatan fitness berwarna hitam yang elegan, memberikan kesan kekuatan dan ketenangan. Pencahayaan yang dramatis menambah suasana intens, sementara lantai kayu dengan sentuhan coklat menambah kenyamanan saat berolahraga. Dengan desain yang stylish dan fungsional, gym kami tidak hanya menyediakan ruang untuk mencapai kebugaran fisik, tetapi juga memberikan pengalaman berolahraga yang penuh semangat dalam suasana yang menenangkan.')">Selengkapnya</button>
            </div>
            <div class="facility-card">
                <img src="aula.jpg" alt="Swimming Pool">
                <h3>Aula</h3>
                <button class="learn-more" onclick="openModal('aula', 'Aula kami memancarkan kemewahan dan kehangatan dengan dominasi warna coklat yang elegan, dipadukan dengan pencahayaan lampu-lampu mewah yang menciptakan atmosfer yang luar biasa. Dinding beraksen coklat yang kaya memberikan kesan hangat dan menenangkan, sementara lampu gantung berdesain mewah dan cahaya lembutnya menambah kesan glamor. Setiap sudut aula ini dirancang untuk memberikan kesan megah, sempurna untuk berbagai acara, mulai dari pertemuan formal hingga perayaan istimewa. Nuansa coklat yang mendalam berpadu dengan kemewahan lampu-lampu tersebut menciptakan suasana yang menawan dan penuh pesona.')">Selengkapnya</button>
            </div>
            <div class="facility-card">
                <img src="musholla.jpg" alt="Swimming Pool">
                <h3>Musholla</h3>
                <button class="learn-more" onclick="openModal('musholla', 'Musholla dengan nuansa coklat keemasan yang memberikan kesan kehangatan dan ketenangan, menciptakan tempat yang ideal untuk beribadah. Dinding yang dihiasi dengan aksen coklat elegan, dipadukan dengan sentuhan keemasan yang memancarkan cahaya lembut, menciptakan atmosfer yang sakral dan penuh kedamaian. Pencahayaan yang lembut semakin menambah ketenangan, menjadikan musholla ini tempat yang sempurna untuk salat, zikir, dan bermunajat kepada Allah. Dengan lafadz-lafadz yang tercantum dengan indah di beberapa sudut, musholla ini mengundang setiap pengunjung untuk merasakan kedamaian sejati dalam ibadah.')">Selengkapnya</button>
            </div>
        </div>

    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Hotel Master. All Rights Reserved.</p>
    </footer>

    <!-- Modal -->
    <div id="facilityModal" style="display:none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.6); justify-content: center; align-items: center;">
        <div style="background: white; padding: 30px; border-radius: 10px; width: 70%; max-width: 900px; text-align: center;">
            <h2 id="modalTitle"></h2>
            <img id="modalImage" src="" alt="" style="width: 100%; border-radius: 10px; margin-bottom: 20px;">
            <p id="modalDescription"></p>
            <button onclick="closeModal()" style="background-color: #f44336; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 5px; font-size: 1rem;">Close</button>
        </div>
    </div>

    <script>
        function openModal(title, description, image) {
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('modalDescription').textContent = description;
            document.getElementById('modalImage').src = image;
            document.getElementById('facilityModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('facilityModal').style.display = 'none';
        }
    </script>

</body>
</html>

<?php
// Database connection settings
$servername = "localhost"; // or your server
$username = "root"; // your username
$password = ""; // your password
$dbname = "reservasi2"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch room data
$sql = "SELECT * FROM kamar";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Master - Rooms</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .hero {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('kamar.jpg') no-repeat center center/cover;
            height: 70vh;
            color: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .room-cards {
            display: flex;
            justify-content: center;
            gap: 50px;
            flex-wrap: wrap;
            padding: 50px 20px;
        }
        .room-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px; /* Ukuran lebar tetap */
            height: 450px; /* Ukuran tinggi tetap */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 30px;
        }
        .room-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .room-card img {
            width: 100%;
            height: 250px; /* Tinggi gambar tetap */
            object-fit: cover;
        }
        .room-card h3 {
            padding: 15px;
            font-size: 1.5rem;
            color: rgb(117, 46, 18);
        }
        .room-card p {
            padding: 0 15px;
            color: #555;
        }
        .btn-details {
            background-color: rgb(24, 42, 61);
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
            text-align: center;
            border-radius: 0 0 10px 10px;
        }
        .btn-details:hover {
            background-color: rgb(34, 62, 83);
        }
        footer {
            background: rgb(24, 42, 61);
            color: white;
            padding: 10px;
            text-align: center;
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
            text-decoration: none;
        }

        nav ul li a:hover {
            background-color:rgb(24, 42, 61);
            border-radius: 5px;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 500px;
            width: 100%;
        }
        .modal-header {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .modal-body p {
            margin: 15px 0;
        }
        .modal-footer {
            display: flex;
            justify-content: flex-end;
        }
        .close-btn {
            padding: 10px 20px;
            background: rgb(24, 42, 61);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .close-btn:hover {
            background: rgb(34, 62, 83);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="dashboard">Home</a></li>
            <li><a href="rooms">Rooms</a></li>
            <li><a href="reservasi">Reservation</a></li>
            <li><a href="facilities">Facilities</a></li>
            <li><a href="blog">Blog</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <header class="hero">
        <h1>Rooms at Celestia Royale</h1>
        <p>Choose your perfect stay</p>
    </header>

    <!-- Rooms Section -->
    <section class="rooms">
        <div class="room-cards">
            <?php
            // Display rooms from database
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="room-card">';
                    echo '<img src="' . $row['gambar'] . '" alt="' . $row['tipe_kamar'] . '">';
                    echo '<h3>' . $row['tipe_kamar'] . '</h3>';
                    echo '<button class="btn-details" onclick="openModal(\'' . $row['tipe_kamar'] . '\', \'' . $row['deskripsi'] . '\', ' . $row['harga_permalam'] . ', ' . $row['kapasitas'] . ', ' . $row['jumlah_kamar'] . ')">Selengkapnya</button>';
                    echo '</div>';
                }
            } else {
                echo '<p>No rooms available.</p>';
            }
            ?>
        </div>
    </section>

    <!-- Modal -->
    <div id="roomModal" class="modal">
        <div class="modal-content">
            <div class="modal-header" id="modalTitle"></div>
            <div class="modal-body">
                <p id="modalDescription"></p>
                <p><strong>Price per night: </strong><span id="modalPrice"></span></p>
                <p><strong>Capacity: </strong><span id="modalCapacity"></span> people</p>
                <p><strong>Available rooms: </strong><span id="modalAvailable"></span></p>
            </div>
            <div class="modal-footer">
                <button class="close-btn" onclick="closeModal()">Close</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Hotel Master. All Rights Reserved.</p>
    </footer>

    <script>
        function openModal(title, description, price, capacity, available) {
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('modalDescription').textContent = description;
            document.getElementById('modalPrice').textContent = 'Rp ' + price.toLocaleString();
            document.getElementById('modalCapacity').textContent = capacity;
            document.getElementById('modalAvailable').textContent = available;
            document.getElementById('roomModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('roomModal').style.display = 'none';
        }
    </script>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>

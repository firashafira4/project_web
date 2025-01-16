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
        /* Styles for your layout */
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
                    // Tentukan nama gambar berdasarkan tipe kamar
                    $imageName = '';

                    // Kondisi untuk menentukan gambar berdasarkan tipe kamar
                    if ($row['tipe_kamar'] == 'Deluxe Room') {
                        $imageName = 'deluxe5.jpg';
                    } elseif ($row['tipe_kamar'] == 'Standard Room') {
                        $imageName = 'standard.jpg';
                    } elseif ($row['tipe_kamar'] == 'Superior Room') {
                        $imageName = 'kamar3.jpg';
                    } elseif ($row['tipe_kamar'] == 'Single Room') {
                        $imageName = 'kamar4.jpg';
                    } elseif ($row['tipe_kamar'] == 'Double Room') {
                        $imageName = 'double3.jpg';
                    } elseif ($row['tipe_kamar'] == 'Family Room') {
                        $imageName = 'famm.jpg';
                    }

                    // Menyusun path gambar
                    $imagePath = 'public/images/' . $imageName;  // Path gambar sesuai nama file

                    echo '<div class="room-card">';
                    echo '<img src="' . $imagePath . '" alt="' . $row['tipe_kamar'] . '">';
                    echo '<h3>' . $row['tipe_kamar'] . '</h3>';
                    echo '<p>' . $row['deskripsi'] . '</p>';
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
<?php
// Database connection
$host = "localhost";
$dbname = "reservasi2";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Get room types for dropdown
$stmt = $conn->query("SELECT DISTINCT tipe_kamar FROM kamar");
$roomTypes = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Get all rooms
$stmt = $conn->query("SELECT * FROM kamar");
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotelmu - Room Reservation</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <style>
        footer {
            background: rgb(24, 42, 61);
            color: white;
            padding: 10px;
            text-align: center;
        }
    
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16 items-center">
                <div class="text-xl font-bold">Celestia Royale</div>
                <div class="flex space-x-4">
                    <a href="dashboard.php" class="hover:text-gray-300">Home</a>
                    <a href="rooms" class="hover:text-gray-300">Room</a>
                    <a href="facilities" class="hover:text-gray-300">Facilities</a>
                    <a href="kontak" class="hover:text-gray-300">Contact</a>
                </div>
            </div>
        </div>
    </nav>



    <!-- Room Listings -->
    <div class="max-w-7xl mx-auto mt-8 grid grid-cols-3 gap-6">
        <?php foreach($rooms as $room): ?>
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="<?php echo $room['gambar'] ?: '/api/placeholder/300/200'; ?>" 
                 alt="<?php echo htmlspecialchars($room['tipe_kamar']); ?>"
                 class="w-full h-48 object-cover">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-4"><?php echo htmlspecialchars($room['tipe_kamar']); ?></h2>
                <div class="space-y-2">
                    <p>Spacious Room: <?php echo $room['kapasitas']; ?> sqm</p>
                    <p>WiFi Access</p>
                    <p>Complimentary Breakfast</p>
                    <p><?php echo htmlspecialchars($room['deskripsi']); ?></p>
                </div>
                <div class="text-right mt-4">
                    <p class="text-orange-500 text-xl font-bold mb-2">
                    IDR <?php echo number_format($room['harga_permalam'], 0, ',', '.'); ?> / night
                    </p>
                    <a href="/booking/<?php echo $room['id_kamar']; ?>" 
   class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600">
   Booking
</a>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Hotel Master. All Rights Reserved.</p>
    </footer>
</body>
</html>

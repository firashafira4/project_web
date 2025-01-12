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

    <!-- Search Form -->
    <div class="max-w-7xl mx-auto p-4 bg-white shadow-sm mt-4 rounded-lg">
        <form class="flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-gray-700 mb-1">Room Type</label>
                <select class="w-full border rounded-md p-2">
                    <option value="">All Room Type</option>
                    <?php foreach($roomTypes as $type): ?>
                        <option value="<?php echo htmlspecialchars($type); ?>">
                            <?php echo htmlspecialchars($type); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="w-24">
                <label class="block text-sm font-medium text-gray-700 mb-1">Guests</label>
                <input type="number" min="1" value="1" class="w-full border rounded-md p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Check In</label>
                <input type="date" class="border rounded-md p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Check Out</label>
                <input type="date" class="border rounded-md p-2">
            </div>
            <div>
                <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-md hover:bg-orange-600">
                    Search Now
                </button>
            </div>
        </form>
    </div>

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
                    <button type="button" class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600" 
                            onclick="openBookingModal(<?php echo $room['id_kamar']; ?>)">
                        Booking
                    </button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

   <!-- Booking Modal -->
   <div id="bookingModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg max-w-md w-full max-h-screen overflow-y-scroll">
            <h2 class="text-2xl font-bold mb-4">Booking Confirmation</h2>
            <form id="bookingForm" action="booking.php" method="GET">
                <input type="hidden" name="room_id" id="roomIdInput">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input type="text" name="guest_name" required class="w-full border rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" required class="w-full border rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Reservation ID</label>
                        <input type="text" name="reservation_id" readonly value="<?php echo uniqid('RES-'); ?>" class="w-full border rounded-md p-2 bg-gray-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Payment Method</label>
                        <select name="payment_method" class="w-full border rounded-md p-2" required>
                            <option value="cash">Cash</option>
                            <option value="qr">QR</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Payment Date</label>
                        <input type="date" name="payment_date" required class="w-full border rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Payment Status</label>
                        <select name="payment_status" class="w-full border rounded-md p-2" required>
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                        </select>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" onclick="closeBookingModal()" 
                                class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">
                            Cancel
                        </button>
                        <button type="submit" 
                                class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                            Proceed to Payment
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Hotel Master. All Rights Reserved.</p>
    </footer>

<script>
    function openBookingModal(roomId) {
        document.getElementById('roomIdInput').value = roomId; // Populate hidden input with room id
        document.getElementById('bookingModal').classList.remove('hidden'); // Show the modal
    }

    function closeBookingModal() {
        document.getElementById('bookingModal').classList.add('hidden'); // Hide the modal
    }
</script>
</body>
</html>

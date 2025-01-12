<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Master</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        h1, h2, h3, p {
            margin: 0;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('Hyatt Regency Malta Opens.jpg') no-repeat center center/cover;
            height: 70vh;
            color: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 600;
        }

        .hero p {
            margin-top: 10px;
            font-size: 1.2rem;
        }

        nav {
            margin-top: 20px;
        }

        nav ul {
            display: flex;
            list-style: none;
            padding: 0;
            gap: 20px;
        }

        nav ul li a {
            font-weight: 600;
            color: white;
            padding: 8px 15px;
            border: 2px solid transparent;
            transition: 0.3s ease;
        }

        nav ul li a:hover {
            border-color: white;
            border-radius: 5px;
        }

        /* Search Form Section */
        .search-form {
            background: #fff;
            padding: 20px;
            margin: -50px auto 30px;
            max-width: 900px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
        }

        .search-form label {
            flex: 1 1 100%;
            font-weight: 600;
        }

        .search-form input,
        .search-form button {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .search-form button {
            background:rgb(24, 42, 61);
            color: white;
            border: none;
            cursor: pointer;
            transition: 0.3s;
        }

        .search-form button:hover {
            background:rgb(24, 42, 61);
        }

        /* Rooms Section */
        .rooms {
            text-align: center;
            padding: 80px 20px;
        }

        .rooms h2 {
            font-size: 2.5rem;
            margin-bottom: 50px;
            color: rgb(117, 46, 18);
        }

        .room-cards {
            display: flex;
            justify-content: center;
            gap: 50px;
            flex-wrap: wrap;
        }

        .room-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 350px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .room-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .room-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .room-card h3 {
            padding: 15px;
            font-size: 1.5rem;
            color:rgb(117, 46, 18);
        }

        /* Footer */
        footer {
            background:rgb(24, 42, 61);
            color: white;
            padding: 10px;
            text-align: center;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <header class="hero">
        <h1>Welcome to Celestia Royale</h1>
        <p>Your perfect stay awaits</p>
        <nav>
            <ul>
                <li><a href="views">Home</a></li>
                <li><a href="rooms">Rooms</a></li>
                <li><a href="reservasi">Reservation</a></li>
                <li><a href="facilities">Facility</a></li>
                <li><a href="blog">Blog</a></li>
            </ul>
        </nav>
    </header>


    <!-- Rooms Section -->
    <section class="rooms">
        <h2>Explore Our Facilities</h2>
        <div class="room-cards">
            <div class="room-card">
                <img src="taman.jpg" alt="Garden">
                <h3>Garden</h3>
            </div>
            <div class="room-card">
                <img src="restorant.jpg" alt="Restaurant">
                <h3>Restaurant</h3>
            </div>
            <div class="room-card">
                <img src="keong.jpg" alt="Swimming Pool">
                <h3>Swimming Pool</h3>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Hotel Master. All Rights Reserved.</p>
    </footer>
</body>
</html>

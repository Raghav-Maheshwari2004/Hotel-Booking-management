<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking System</title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js"></script>
</head>
<body>
    <header>
        <h1>Welcome to Our Hotel Booking System</h1>
        <div class="navbar">
            <button onclick="showSection('room')">Make Booking</button>
            <button onclick="showSection('amenities')">About Our Amenities</button>
            <button onclick="showSection('transportation')">About Our Transportation</button>
            <button onclick="showSection('nearby')">Nearby Places to Visit</button>
            <button onclick="showSection('checkDetails')">Check Booking Details</button>
        </div>
    </header>
      <!-- Background Video ->
      <div class="video-background">
        <video autoplay loop muted>
            <source src="855139-hd_1920_1080_30fps.mp4" type="video/mp4">
            <!-- Fallback content if video doesn't load -->
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Room Booking Form -->
    <section id="room" class="form-section hidden">
        <h2>Room Booking</h2>
        <form action="book_room.php" method="POST">
            <label>Full Name:</label>
            <input type="text" name="full_name" required>
            <label>Aadhar Number:</label>
            <input type="text" name="aadhar_number" required>
            <label>Number of Persons:</label>
            <input type="number" name="no_of_persons" required>
            <label>Number of Rooms:</label>
            <input type="number" name="no_of_rooms" required>
            <label>Check-in Date:</label>
            <input type="date" name="check_in_date" required>
            <label>Check-out Date:</label>
            <input type="date" name="check_out_date" required>
            <label>Food Preferences:</label>
            <select name="food_choices[]" multiple>
                <option value="lunch">Lunch</option>
                <option value="dinner">Dinner</option>
                <option value="breakfast">Breakfast</option>
            </select>
            <button type="submit">Book Room</button>
        </form>
    </section>

    <!-- Amenities Booking Form -->
    <section id="amenities" class="form-section hidden">
        <h2>Amenities Booking</h2>
        <form action="book_amenities.php" method="POST">
            <label>Aadhar Number:</label>
            <input type="text" name="aadhar_number" required>
            <label>Select Amenities:</label><br>
            <input type="checkbox" name="amenity[]" value="gym"> Gym (2400 INR)<br>
            <input type="checkbox" name="amenity[]" value="swimming pool"> Swimming Pool (1200 INR)<br>
            <input type="checkbox" name="amenity[]" value="spa"> Spa (3000 INR)<br>
            <input type="checkbox" name="amenity[]" value="outdoor games"> Outdoor Games (1300 INR)<br>
            <input type="checkbox" name="amenity[]" value="indoor games"> Indoor Games (1000 INR)<br>
            <input type="checkbox" name="amenity[]" value="trekking"> Trekking (3000 INR)<br>
            <button type="submit">Book Amenities</button>
        </form>
    </section>

    <!-- Transportation Booking Form -->
    <section id="transportation" class="form-section hidden">
        <h2>Transportation Booking</h2>
        <form action="book_transportation.php" method="POST">
            <label>Aadhar Number:</label>
            <input type="text" name="aadhar_number" required>
            <label>Number of People:</label>
            <input type="number" name="no_of_people" required>
            <label>Pick-up Location:</label>
            <input type="text" name="pick_up_location" required>
            <label>Drop Location:</label>
            <input type="text" name="drop_location" required>
            <button type="submit">Book Transportation</button>
        </form>
    </section>

    <!-- Nearby Places Section -->
    <section id="nearby" class="info-section hidden">
    <section class="nearby-places">
    <h2>Nearby Landmarks</h2>

    <!-- Place 1: Temple -->
    <div class="place">
        <img src="golden_temple.jpeg" alt="Ancient Temple">
        <h3>Vellore Golden Temple</h3>
        <p>This ancient temple, located just 10 km from the hotel, offers a peaceful environment with beautiful architecture and spiritual ambiance.</p>
    </div>

    <!-- Place 2: Amusement Park -->
    <div class="place">
        <img src="imagica.jpg" alt="Imagica Amusement Park">
        <h3>Imagica Amusement Park</h3>
        <p>A thrilling amusement park with world-class rides and attractions, perfect for family fun. Visit their website for more details.</p> 
    </div>

    <!-- Place 3: Art Museum -->
    <div class="place">
        <img src="mueseum.jpeg" alt="City Art Museum">
        <h3>Vellore Museum</h3>
        <p>The City Art Museum showcases local art and cultural heritage. A must-visit for art lovers, located just 5 km from the hotel.</p>
    </div>

    <!-- Place 4: Beach -->
    <div class="place">
        <img src="beach.jpeg" alt="Sunny Beach">
        <h3>Sunny Beach</h3>
        <p>Enjoy a relaxing day at Sunny Beach, known for its golden sands and clear waters. A perfect spot to unwind, located 15 km from the hotel.</p>
    </div>
</section>


        
    </section>

    <!-- Check Booking Details Form -->
    <section id="checkDetails" class="form-section hidden">
        <h2>Check Booking Details</h2>
        <form action="check_details.php" method="POST">
            <label>Aadhar Number:</label>
            <input type="text" name="aadhar_number" required>
            <button type="submit">Check Details</button>
        </form>
    </section>
</body>
</html>

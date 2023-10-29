<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rafiki Rental House Dashboard</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>

<header>
    <h1>Welcome to Your Rental House Dashboard</h1>
    <a href="logout.php">Logout</a>
</header>

<main>
    <section id="search">
        <h2>Search for Rental Houses</h2>
        <form action="search_results.php" method="post">
                <label for="location">Location:</label>
                <select id="location" name="location">
                    <option value="any">Any</option>
                    <option value="rafiki">Rafiki</option>
                    <option value="Oloika">Oloika</option>
                    <option value="OBT">OBT</option>
                    <option value="WestGate">WestGate</option>
                    <option value="Barkasen">Barkasen</option>
                    <option value="Kampi">Kampi</option>
                    <option value="Rongai">Rongai</option>
                    <option value="Mangu">Mangu</option>
                </select>
            
                <label for="price_min">Price Range:</label>
                <input type="number" id="price_min" name="price_min" placeholder="Min">
                <input type="number" id="price_max" name="price_max" placeholder="Max">
            
                <label for="bedrooms">Bedrooms:</label>
                <select id="bedrooms" name="bedrooms">
                    <option value="any">Any</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                
            
                <!-- Add more search fields for other criteria (bathrooms, amenities, property type, etc.) -->
            
                <input type="submit" value="Search">
            </form>
            
    </section>

    <section id="listings">
        <h2>Your Listings</h2>
        <!-- Display user's rental listings here -->
        <div class="listing">
            <h3>House in XYZ Neighborhood</h3>
            <p>Price: $1000/month</p>
            <!-- Include more details like location, features, etc. -->
            <a href="edit_listing.php">Edit</a> <!-- Link to edit listing page -->
            <a href="delete_listing.php">Delete</a> <!-- Link to delete listing page -->
        </div>

        <!-- Add more listings as needed -->
    </section>
</main>

<footer>
    <p>&copy; 2023 Rafiki Rental Houses</p>
</footer>

</body>
</html>

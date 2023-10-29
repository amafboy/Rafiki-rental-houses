<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "rafiki";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables from form input
$location = $_POST["location"];
$price_min = $_POST["price_min"];
$price_max = $_POST["price_max"];
$bedrooms = $_POST["bedrooms"];
// Add more variables for other search criteria as needed

// Build the SQL query based on the search criteria
$sql = "SELECT * FROM rental_listings WHERE ";

// Location
if ($location != "any") {
    $sql .= "location='$location' AND ";
}

if (!empty($price_min)) {
    $sql .= "price >= $price_min AND ";
}

if (!empty($price_max)) {
    $sql .= "price <= $price_max AND ";
}

if ($bedrooms != "any") {
    $sql .= "bedrooms=$bedrooms AND ";
}

$sql = rtrim($sql, "AND ");

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='listing'>";
        echo "<h3>" . $row["title"] . "</h3>";
        echo "<p>Price: $" . $row["price"] . "/month</p>";
        // Include more details like location, features, etc.
        echo "</div>";
    }
} else {
    echo "No results found.";
}

$conn->close();
?>

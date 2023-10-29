<?php
// Connect to your database (replace with your own credentials)
$servername = "localhost";
$db_username = "your_username";
$db_password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the listing ID from the form
    $listing_id = $_POST["listing_id"];

    // Delete the listing from the database
    $sql = "DELETE FROM rental_listings WHERE id='$listing_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Listing deleted successfully!";
    } else {
        echo "Error deleting listing: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

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
    // Get form data
    $listing_id = $_POST["listing_id"];
    $new_title = $_POST["new_title"];
    $new_price = $_POST["new_price"];
    // Add more fields as needed

    // Update the listing in the database
    $sql = "UPDATE rental_listings 
            SET title='$new_title', price='$new_price'
            WHERE id='$listing_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Listing updated successfully!";
    } else {
        echo "Error updating listing: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

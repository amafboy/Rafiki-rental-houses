<!DOCTYPE html>
<html>
<head>
    <title>rafiki</title>
</head>
<body>
<h1>Data from MySQL</h1>
<?php
include 'connect.php';
$sql = "SELECT * FROM `users`;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "rafiki";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `users`;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
</body>
</html>


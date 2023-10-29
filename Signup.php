<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (empty($username) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $dbname = "rafiki";

        $conn = new mysqli($localhost, $root, $db_password, $rafiki);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
} else {
    header("Location: Signup.php");
    exit();
}
?>

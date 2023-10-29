<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    
    if (empty($username) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $dbname = "rafiki";

        $conn = new mysqli($servername, $db_username, $db_password, $dbname);

        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row["password"];

            if (password_verify($password, $hashed_password)) {
                $_SESSION["user_id"] = $row["id"]; 
                header("Location: dashboard.php"); 
            } else {
                echo "Incorrect password. Please try again.";
            }
        } else {
            echo "User not found. Please check your username.";
        }

        
        $conn->close();
    }
} else {
    
    header("Location: login.php");
    exit();
}
?>

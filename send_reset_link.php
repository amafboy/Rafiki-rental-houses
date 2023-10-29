<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST["email"];
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please provide a valid email address.";
    } else {
        $token = bin2hex(random_bytes(16));
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $dbname = "rafiki";
        

        $conn = new mysqli($servername, $db_username, $db_password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $sql = "UPDATE users SET reset_token='$token' WHERE email='$email'";
            if ($conn->query($sql) === TRUE) {
                $reset_link = "http://Rafiki/reset_password.php?token=$token"; // Change to your actual domain
                $to = $email;
                $subject = "Password Reset";
                $message = "Click the following link to reset your password: $reset_link";
                $headers = "From: aathman201@gmail.com";

                if (mail($to, $subject, $message, $headers)) {
                    echo "A password reset link has been sent to your email.";
                } else {
                    echo "Error sending the reset link. Please try again later.";
                }
            } else {
                echo "Error updating the reset token: " . $conn->error;
            }
        } else {
            echo "Email not found in the database.";
        }
        $conn->close();
    }
} else {
    header("Location: forgot_password.php");
    exit();
}
?>

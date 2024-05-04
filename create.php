<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // db connect attempt
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "PowerLift";

    // connect try
    $conn = new mysqli($servername, $username, $password, $dbname);

    // check if okie
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // sql injection prevention
    $email = $conn->real_escape_string($_POST['email']);
    $activation_code = $conn->real_escape_string($_POST['activation_code']);

    // check for email and activation code
    $sql = "SELECT * FROM users WHERE email='$email' AND activation_code='$activation_code'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // email and activation code match, proceed to set new password
        $_SESSION['email'] = $email;
        header("Location: reset_password.php");
        exit();
    } else {
        // invalid email or activation code
        $_SESSION['error'] = "Invalid email or activation code";
        header("Location: forgot.php");
        exit();
    }

    $conn->close();
}
?>
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

    // Retrieve user's email from session
    $email = $_SESSION['email'];

    // Get new password from the form
    $new_password = $conn->real_escape_string($_POST['password']);

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the user's password in the database
    $sql = "UPDATE users SET password='$hashed_password' WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        // Password updated successfully
        $_SESSION['success'] = "Password updated successfully. You can now log in with your new password.";
        header("Location: index.php");
        exit();
    } else {
        // Error updating password
        $_SESSION['error'] = "Error updating password: " . $conn->error;
        header("Location: reset_password.php");
        exit();
    }

    $conn->close();
}
?>

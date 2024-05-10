<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "PowerLift";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $conn->real_escape_string($_SESSION['email']);
    $time_out = date("H:i:s");

    // Update visit history with time out
    $sql = "UPDATE visit_history SET time_out = ? WHERE user_email = ? AND time_out IS NULL";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $time_out, $email);
    if (!$stmt->execute()) {
        echo "Error updating visit history: " . $stmt->error;
    } else {
        // Unset all of the session variables
        $_SESSION = array();
        // Destroy the session
        session_destroy();
        // Redirect to the login page or any other desired page
        header("Location: index.php");
        exit();
    }
}
?>

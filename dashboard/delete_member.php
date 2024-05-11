<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PowerLift";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the 'id' parameter is set in the POST request
if (isset($_POST['id'])) {
    // Escape the ID to prevent SQL injection
    $id = $conn->real_escape_string($_POST['id']);

    // Prepare SQL statement to delete member with the given ID
    $sql = "DELETE FROM users WHERE id = '$id'";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        // If deletion is successful, send a success response
        echo "Member deleted successfully";
    } else {
        // If deletion fails, send an error response
        echo "Error deleting member: " . $conn->error;
    }
} else {
    // If the 'id' parameter is not set, send an error response
    echo "ID parameter not set";
}

// Close the database connection
$conn->close();
?>

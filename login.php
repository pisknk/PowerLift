<?php
// for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    $password = $conn->real_escape_string($_POST['password']);

    // check only for email
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // then password
        if (password_verify($password, $row['password'])) {
            // encyr
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $row['role'];

            // role
            if ($_SESSION['role'] == 'admin') {
                header("Location: dashboard/admin.php");
                exit();
            } elseif ($_SESSION['role'] == 'users') {
                header("Location: hello/index.php");
                exit();
            } else {

            }
        } else {
            // invalid password error
            echo "Invalid email or password";
        }
    } else {
        // email error
        echo "Invalid email or password";
    }

    $conn->close();
}
?>

<?php
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

    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
        if (password_verify($password, $row['password'])) {
            // Check if the user has an active subscription
            if ($row['subscription_end_date'] != null && strtotime($row['subscription_end_date']) > time()) {
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $row['role'];

                if ($_SESSION['role'] == 'admin') {
                    header("Location: dashboard/admin.php");
                    exit();
                } elseif ($_SESSION['role'] == 'users') {
                    $_SESSION['firstName'] = $row['firstName'];
                    $_SESSION['lastName'] = $row['lastName'];
                    $_SESSION['activationCode'] = $row['activation_code'];
                    $_SESSION['tier'] = $row['tier'];
                    header("Location: hello/index.php");
                    exit();
                } else {
                    // Handle other roles if needed
                }
            } else {
                $_SESSION['email'] = $email;
                $_SESSION['firstName'] = $row['firstName'];
                $_SESSION['lastName'] = $row['lastName'];
                $_SESSION['activationCode'] = $row['activation_code'];
                $_SESSION['tier'] = $row['tier'];
                header("Location: hello/nosub.php");
                exit();
            }
        } else {
            echo "Invalid email or password";
        }
    } else {
        echo "Invalid email or password";
    }

    $conn->close();
}
?>

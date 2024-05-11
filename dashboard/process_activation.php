<?php
session_start();

$db_host = 'localhost';
$db_name = 'PowerLift';
$db_user = 'root';
$db_pass = '';

try {
    // Connect to the database
    $pdo = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $activation_code = $_POST["activation_code"];
        
        // Retrieve user information from the database based on activation code
        $sql = "SELECT firstName, lastName, email, tier FROM users WHERE activation_code = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$activation_code]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            // Redirect to areyousure.php and pass user information via URL parameters
            header("Location: areyousure.php?activation_code={$activation_code}&firstName={$user['firstName']}&lastName={$user['lastName']}&email={$user['email']}&tier={$user['tier']}");
            exit();
        } else {
            // Display browser alert for invalid activation code
            echo "<script>alert('Whoops! The code you entered is invalid. Please try again.')</script>";
            echo "<script>window.location.href = 'activate.php';</script>";
            exit();
        }
    } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['confirm']) && $_GET['confirm'] == "true") {
        // Admin has confirmed the activation, update subscription start and end dates
        $activation_code = $_GET["activation_code"];

        // Retrieve user information from the database based on activation code
        $sql = "SELECT tier FROM users WHERE activation_code = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$activation_code]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $tier = $row['tier'];

            // Determine subscription start and end dates based on tier
            $subscription_start_date = date('Y-m-d'); // Subscription starts today
            $subscription_end_date = date('Y-m-d', strtotime("+{$tier} months")); // Subscription ends after specified number of months

            // Update the database with the subscription start and end dates
            $update_sql = "UPDATE users SET subscription_start_date = ?, subscription_end_date = ? WHERE activation_code = ?";
            $update_stmt = $pdo->prepare($update_sql);
            $update_stmt->execute([$subscription_start_date, $subscription_end_date, $activation_code]);

            // Display browser alert for successful activation
            echo "<script>alert('Member activated successfully! Thank you!')</script>";
            echo "<script>window.location.href = 'admin.php';</script>";
            exit();
        } else {
            // Display browser alert for invalid activation code
            echo "<script>alert('Whoops! The code you entered is invalid. Please try again.')</script>";
            echo "<script>window.location.href = 'activate.php';</script>";
            exit();
        }
    }
} catch(PDOException $e) {
    // Handle database connection errors
    echo "Connection failed: " . $e->getMessage();
}
?>

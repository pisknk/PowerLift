<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page if not logged in
    header("Location: ../index.php");
    exit();
}

// Fetch user data from the database
$db_host = 'localhost';
$db_name = 'PowerLift';
$db_user = 'root';
$db_pass = '';

try {
    // Attempt to connect to the database
    $pdo = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch user data based on the logged-in user's email
    $email = $_SESSION['email'];
    $stmt = $pdo->prepare("SELECT activation_code, tier, firstName, lastName FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    // Extract user data
    $activationCode = $userData['activation_code'];
    $tier = $userData['tier'];
    $firstName = $userData['firstName'];
    $lastName = $userData['lastName'];
} catch(PDOException $e) {
    // Handle database connection errors
    echo "Connection failed: " . $e->getMessage();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Not yet subscribed.</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>

<form action="" method="post"> <!-- form validation -->
    <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh; margin: 0;">

        <div class="container"> <!-- Card container -->
            <div class="card backk">
                <div class="card-body">
                    <div class="container">
                        <div class="row align-items-start">

                            <div class="col"> <!-- input and controls -->
                            
                                <br><br><br>
                                <img src="../img/helloalt.webp" class="hello">
                                <br><br>
                                <h1>Hello,<br> <?php echo $firstName; ?>!</h1>

                            </div>

                            <div class="col"> <!-- continue -->
                                <div class="card maincard">
                                    <div class="card-body text-center">
                                        <div class="head">
                                            <br>
                                            <p>You don't have a subscription yet.<br>Before you can enter the gym, please pay for a membership.</p><br>
                                        </div>

                                        <div class="dashes">
                                            <p>Please show this code to the cashier and pay:</p>
                                            <div class="subscription">
                                                <p2><?php echo $activationCode; ?></p2> <br>
                                                <p3><b>MEMBERSHIP WILL START AFTER PAYMENT</b></p3>
                                            </div>
                                            <div class="text-start">
                                                <p4><b>Duration:</b> <?php echo $tier; ?> Month(s)</p4><br>
                                                <p5><b>Name:</b> <?php echo $firstName; ?> <?php echo $lastName; ?></p5><br>
                                                <p6><b>Email:</b> <?php echo $email; ?></p6><br>
                                            </div>
                                        </div>

                                        <div class="buttons">
                                            <br>
                                            <a role="button" href="../index.php" class="btn btn-danger">Log out</a>
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

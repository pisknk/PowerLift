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
    $stmt = $pdo->prepare("SELECT firstName, subscription_end_date FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    // Extract user data
    $userFirstName = $userData['firstName'];
    $membershipExpirationDate = date("F j, Y", strtotime($userData['subscription_end_date']));
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
    <title>Welcome Back, <?php echo $userFirstName; ?>! </title>
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
                            
                                <br>
                                <img src="../img/helloalt.webp" class="hello">
                                <br><br>
                                <h1>Welcome back,<br> <?php echo $userFirstName; ?>!</h1>

                            </div>

                            <div class="col"> <!-- continue -->
                                <div class="card maincard">
                                    <div class="card-body text-center">
                                        <div class="head">
                                            <br>
                                            <p>You can now exit the site,<br> but don’t forget to come back here later to logout.</p><br>
                                        </div>

                                        <a href="membership.html"> <div class="card boxx">

                                            <p1>MEMBERSHIP WILL EXPIRE ON:</p1><br>
                                            <p2><b><?php echo $membershipExpirationDate; ?></b></p2><br>
                                            <p3>tap card to manage your subscription</p3>

                                        </div> </a>

                                        <div class="buttons">
                                            <br>
                                            <a role="button" href="../index.php" class="btn btn-primary">View Visit History</a>
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
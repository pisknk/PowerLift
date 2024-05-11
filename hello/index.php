<?php
session_start();

$db_host = 'localhost';
$db_name = 'PowerLift';
$db_user = 'root';
$db_pass = '';

try {
    // connect to the database
    $pdo = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // fetch user data
    $email = $_SESSION['email'];
    $stmt = $pdo->prepare("SELECT firstName, subscription_end_date FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    // extract user data
    $userFirstName = $userData['firstName'];
    $membershipExpirationDate = date("F j, Y", strtotime($userData['subscription_end_date']));
} catch(PDOException $e) {
    // database connection errors
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

<form action="../logout.php" method="post"> <!-- form validation -->
    <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh; margin: 0;">

        <div class="container"> <!-- Card container -->
            <div class="card backk">
                <div class="card-body">
                    <div class="container">
                        <div class="row align-items-start">

                            <div class="col"> <!-- input and controls -->
                            
                                <br><br>
                                <img src="../img/helloalt.webp" class="hello">
                                <br><br>
                                <h1><b>Welcome back, <?php echo $userFirstName; ?>!</b></h1>

                            </div>

                            <div class="col"> <!-- continue -->
                                <div class="card maincard">
                                    <div class="card-body">
                                        <div class="head text-center">
                                            <br>
                                            <p>You can now exit the site,<br> but don’t forget to come back here later to logout.</p><br>
                                        </div>

                                        <div class="card boxx text-center">

                                            <p1>MEMBERSHIP WILL EXPIRE ON:</p1><br>
                                            <p2><b><?php echo $membershipExpirationDate; ?></b></p2>

                                        </div>

                                        <div class="buttons text-center">
                                            <br>

                                            <a role="button" href="history.php" class="btn btn-primary">View Visit History</a>
                                            <button type="submit" class="btn btn-danger">Log out</button>
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

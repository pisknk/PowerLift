<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page if not logged in
    header("Location: ../index.php");
    exit();
}

// Fetch visit history data from the database
$db_host = 'localhost';
$db_name = 'PowerLift';
$db_user = 'root';
$db_pass = '';

try {
    // Connect to the database
    $pdo = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch visit history for the logged-in user
    $email = $_SESSION['email'];
    $stmt = $pdo->prepare("SELECT * FROM visit_history WHERE user_email = ?");
    $stmt->execute([$email]);
    $visitHistory = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($visitHistory as &$visit) {
        // Calculate visit duration
        $timeIn = strtotime($visit['time_in']);
        $timeOut = strtotime($visit['time_out']);
        $duration = ($timeOut - $timeIn) / 3600; // Convert seconds to hours
        $visit['duration'] = round($duration, 2); // Round to 2 decimal places
    }
} catch(PDOException $e) {
    // Handle database connection errors
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendance History</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>

<form action="../logout.php" method="post"> <!-- form validation -->
<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh; margin: 0;">
    <div class="container">
        <div class="card backk">
            <div class="card-body">
                <div class="container">
                    <div class="row align-items-start">
                        <div class="col">
                            <br>
                            <img src="../img/history.webp" class="hello">
                            <br><br>
                            <h1><b>Attendance History</b></h1>
                        </div>
                        <div class="col">
                            <div class="card maincard">
                                <div class="card-body text-center">
                                    <div class="head">
                                        <br>
                                        <p>Here is your digital logbook:</p><br>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Time in</th>
                                                <th scope="col">Time out</th>
                                                <th scope="col">Duration (hours)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($visitHistory as $index => $visit): ?>
                                                <tr>
                                                    <th scope="row"><?php echo $index + 1; ?></th>
                                                    <td><?php echo $visit['visit_date']; ?></td>
                                                    <td><?php echo $visit['time_in']; ?></td>
                                                    <td><?php echo $visit['time_out']; ?></td>
                                                    <td><?php echo $visit['duration']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <div class="buttons">
                                        <br>
                                        <a role="button" href="index.php" class="btn btn-primary">Go Back</a>
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

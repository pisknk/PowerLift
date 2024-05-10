<?php
session_start();

// Database connection parameters
$db_host = 'localhost';
$db_name = 'PowerLift';
$db_user = 'root';
$db_pass = '';

try {
    // Connect to the database
    $pdo = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch the most recent PowerLifter
    $stmt = $pdo->query("SELECT firstName, lastName, tier FROM users WHERE role = 'users' ORDER BY subscription_start_date DESC LIMIT 1");
    $recentPowerLifter = $stmt->fetch(PDO::FETCH_ASSOC);

    // Count the total number of PowerLifters
    $stmt = $pdo->query("SELECT COUNT(*) as totalPowerLifters FROM users WHERE role = 'users' AND subscription_start_date IS NOT NULL");
    $totalPowerLifters = $stmt->fetch(PDO::FETCH_ASSOC)['totalPowerLifters'];

    // Count the total number of Members
    $stmt = $pdo->query("SELECT COUNT(*) as totalMembers FROM users");
    $totalMembers = $stmt->fetch(PDO::FETCH_ASSOC)['totalMembers'];
} catch(PDOException $e) {
    // Handle database connection errors
    echo "Connection failed: " . $e->getMessage();}
   

if (isset($_SESSION['activation_success']) && $_SESSION['activation_success']) {
    // Display the alert
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>✅</strong> User subscription has been verified. <br><br> Thanks for using PowerLift!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    // Unset the session variable to prevent displaying the alert again on page refresh
    unset($_SESSION['activation_success']);
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PowerCentre</title>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="styles.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </head>

    <body>

        <div class="container-fluid">

        <div class="row"> <!-- divider sa sidebar ug content -->

            <div class="col-md-3 sidebar"> 

                <ul class="nav flex-column"> <!-- sidebar -->

                    <li class="nav-item">
                        <a class="nav-link active" href="admin.php"><i class="bi bi-house-fill"></i>Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link inactive" href="inventory.html"><i class="bi bi-phone"></i>Members</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link inactive" href="sales.html"><i class="bi bi-bar-chart-line"></i>Checkup</a>
                    </li>

                    <div class="bottom-item dropdown"> <!-- items sa ubos -->

                        <li class="nav-item dropdown"> <!-- admin drop down ment -->

                            <a class="nav-link dropdown-toggle admintext" href="#" role="button" id="adminDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../img/smallogo.png" class="logo"> Admin
                            </a>

                            <div class="dropdown-menu" aria-labelledby="adminDropdown">
                            
                            <form action="../logout.php" method="post"> <!-- form validation -->
                            <button class="dropdown-item logoutred" type="submit">Log out</>
                            </form>
                            
                            </div>

                        </li>

                    </div>

                </ul>

                
            </div>

            <div class="col-md-9 content"> <!-- main content -->

                <h2>Welcome, Admin!</h2> <!-- replace the word admin with the logged in user's first name -->
                <p>Here are some quick actions you can try.</p>

                <div class="row"> <!-- para ma same line ang action platters -->

                    <div class="col-md-4"> <!-- add products -->
                        <div class="card" style="width: 18rem;">
                            <a href="activate.php" class="add">
                                <img src="../img/activate.png" class="card-img-top">
                                <div class="card-body">
                                <h5 class="card-title">Activate a Subscriber</h5>
                                <p2 class="card-text">Simply enter their membership code here.</p2>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4"> <!-- manage products -->
                        <div class="card" style="width: 18rem;">
                            <a href="inventory.html" class="add">
                                <img src="../img/manage.png" class="card-img-top">
                                <div class="card-body">
                                <h5 class="card-title">Manage Members</h5>
                                <p3 class="card-text">Add, delete, or modify enrolled members details.</p3>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4"> <!-- purchase history -->
                        <div class="card" style="width: 18rem;">
                            <a href="sales.html" class="add">
                                <img src="../img/equipments.png" class="card-img-top">
                                <div class="card-body">
                                <h5 class="card-title">Quick Checkup</h5>
                                <p3 class="card-text">Look at the equipment's health stats. [BETA]</p3>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="line"></div> <!-- line for depth effect - widget area -->

                    <div class="card recentcard"> <!-- recently subscribed -->
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Recent PowerLifter</h5>
                                <?php if ($recentPowerLifter): ?>
                                    <p class="card-text"><?php echo $recentPowerLifter['firstName'] . ' ' . $recentPowerLifter['lastName']; ?></p>
                                    <p class="card-text"><small class="text-body-secondary">Tier <?php echo $recentPowerLifter['tier']; ?> Subscriber!</small></p>
                                <?php else: ?>
                                    <p class="card-text">No recent subscribers.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="card recentcard"> <!-- total subscribed members -->
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Total PowerLifters</h5>
                                <p class="card-text"><?php echo $totalPowerLifters; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="card recentcard"> <!-- total number of members -->
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Total Members</h5>
                                <p class="card-text"><?php echo $totalMembers; ?></p>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
                    
        </div>

    <!-- javascript for dropdown menu -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>

</html>

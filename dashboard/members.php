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

// Read Members Data from the Database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Members</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    <div class="container-fluid">

        <div class="row">

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

            <div class="col-md-9 content">

                <!-- Main Content -->

                <h2>Manage Members</h2>
                <p>Here are some quick actions you can try.</p>

                <div class="line"></div>

                <main role="main" class="align-items-center" style="margin-top: 3rem; padding: 20px;">
                    <div class="row">
                        <div class="col-md mx-auto">
                            <div class="card w-100 inventory">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped table-bordered text-center">
                                            <thead>
                                                <tr class="table-dark">
                                                    <th>#</th>
                                                    <th>Role</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Tier</th>
                                                    <th>Activation Code</th>
                                                    <th>Subscription Start Date</th>
                                                    <th>Subscription End Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row["id"] . "</td>";
                                                        echo "<td>" . $row["role"] . "</td>";
                                                        echo "<td>" . $row["firstName"] . " " . $row["lastName"] . "</td>";
                                                        echo "<td>" . $row["email"] . "</td>";
                                                        echo "<td>" . $row["tier"] . "</td>";
                                                        echo "<td>" . $row["activation_code"] . "</td>";
                                                        echo "<td>" . $row["subscription_start_date"] . "</td>";
                                                        echo "<td>" . $row["subscription_end_date"] . "</td>";
                                                        echo '<td>
                                                                <a class="btn btn-sm btn-primary" href="edit.php?id=' . $row["id"] . '" title="Edit Listing"><i class="bi-pencil-square edit"></i></a>
                                                                <button class="btn btn-sm btn-danger" title="Delete"><i class="bi-trash delete"></i></button>
                                                              </td>';
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='9'>No members found</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </main>

            </div>
        </div>

    </div>

</body>

</html>

<?php
$conn->close();
?>

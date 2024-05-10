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

// Initialize $row variable to avoid undefined variable error
$row = [];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch member details from the database based on ID
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Now you can use $row to populate the form fields with existing data
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the updated values from the form
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

    // Update the member details in the database
    $updateSql = "UPDATE users SET firstName = '$firstName', lastName = '$lastName', email = '$email' WHERE id = $id";
    if ($conn->query($updateSql) === TRUE) {
?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>✅</strong> User details has been updated. Refresh page to reflect changes. <br><br> Or you can now click on the X button to go back safely.
            <button type="button" class="btn-close" aria-label="Close" onclick="window.location.href = 'members.php';"></button>
        </div>
<?php
    } else {
        echo "Error updating member details: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Member Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../signup.css" rel="stylesheet">
</head>
<body>

<form action="" method="post"> <!-- form validation -->
    <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh; margin: 0;">
    
        <div class="container"> <!-- Card container -->
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row align-items-start">
                          <div class="col"> <!-- input and controls -->

                            <div class="dashes text-center">

                            <h2>You can edit the following details:</h2>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Juan" required autofocus value="<?php echo $row['firstName']; ?>">
                                <label for="firstName">First Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Dela Cruz" required value="<?php echo $row['lastName']; ?>">
                                <label for="lastName">Last Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="example@website.com" required value="<?php echo $row['email']; ?>">
                                <label for="email"><i class="bi bi-envelope-at"></i> Email</label>
                            </div>

                            </div>

                        </div>

                          <div class="col"> <!-- continue -->
                            <div class="inside">
                                <br><br><br>
                                <h1>📝 Edit Details</h1><br><br>
                                <p1>Current Details</p1><br><br>
                                <p2 class="text-start"><b>Name: <?php echo $row['firstName'] . ' ' . $row['lastName']; ?></b> </p2><br>
                                <p2 class="text-start"><b>Email: <?php echo $row['email']; ?></b> </p2><br><br><br>

                                <button type="submit" class="btn btn-primary">Continue</button><br><br>
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

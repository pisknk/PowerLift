<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thanks for regestering!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="reciept.css" rel="stylesheet">
</head>
<body>

<?php
function generateRandomCode() {
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '0123456789';

    $randomLetters = substr(str_shuffle($letters), 0, 3);
    $randomNumbers = substr(str_shuffle($numbers), 0, 4);

    return $randomLetters . '-' . $randomNumbers;
}

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$tier = $_POST['tier'];

// generate random code
$randomCode = generateRandomCode();

// encrypt password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// default role for new users
$defaultRole = "users";

// connection to the database
$conn = new mysqli('localhost', 'root', '', 'PowerLift');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
} else {
    // prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users(firstName, lastName, email, password, tier, activation_code, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $firstName, $lastName, $email, $hashedPassword, $tier, $randomCode, $defaultRole);
    
    // execute
    $stmt->execute();
    
    // check if the registration was successful
    if ($stmt->affected_rows > 0) {
        echo '<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh; margin: 0;">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="container text-center">
                            <div class="row align-items-start">
                                <div class="col">
                                    <div class="dashes">
                                        <h1>Payment Instructions:</h1>
                                        <p>Please show this code to the cashier and pay:</p>
                                        <div class="subscription">
                                            <p2>' . $randomCode . '</p2> <br>
                                            <p3><b>MEMBERSHIP WILL START AFTER PAYMENT</b></p3>
                                        </div>
                                        <p4>Duration: ' . $tier . ' Month(s)</p4><br>
                                        <p5>Name: ' . $firstName . ' ' . $lastName . '</p5><br>
                                        <p6>Email: ' . $email . '</p6><br>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="insides">
                                        <img src="img/smallogo.png"><br><br>
                                        <p1>thanks for subscribing to</p1>
                                        <h1>PowerLift</h1><br><br>
                                        <a class="btn btn-primary" href="index.php" role="button">Back to Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
        exit();
    } else { // if registration failed
        echo "Registration Failed :( Please go back and try again.";
    }

    // close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

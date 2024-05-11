<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // db connect attempt
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "PowerLift";

    // connect try
    $conn = new mysqli($servername, $username, $password, $dbname);

    // check if okie
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // sql injection prevention
    $email = $conn->real_escape_string($_POST['email']);
    $activation_code = $conn->real_escape_string($_POST['activation_code']);

    // check for email and activation code
    $sql = "SELECT * FROM users WHERE email='$email' AND activation_code='$activation_code'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // email and activation code match, proceed to set new password
        $_SESSION['email'] = $email;
        header("Location: reset_password.php");
        exit();
    } else {
        // invalid email or activation code
        echo '<script>alert("Whoops! Email or Membership Code does not exist on the database. Please try again."); window.location.href = "forgot.php";</script>';
        exit();
    }

    $conn->close();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password?</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>

<form method="post"> <!-- form validation -->
    <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh; margin: 0;">

        <div class="container"> <!-- card container -->
            <div class="card backk">
                <div class="card-body">
                    <div class="container">
                        <div class="row align-items-start">

                            <div class="col"> <!-- input and controls -->
                            
                            <br><br><br>
                                <img src="img/forgot.webp" class="hello">
                                <br><br>
                                <h1>Did you forget your </h1>
                                <h1>access to <b>Power</b>Lift?</h1>

                            </div>

                            <div class="col"> <!-- continue -->
                                <div class="card maincard">
                                    <div class="card-body text-center">
                                        <div class="head">
                                            <br>
                                            <img src="img/loginlogo.png"><br><br>
                                            <p1>Please enter your Email and Membership Code below <br> to verify your identity.</p1><br><br><br>
                                        </div>
                                        <div class="inputs">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required autofocus>
                                                <label for="floatingInput">Email address</label>
                                            </div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingPassword" name="activation_code" placeholder="Membership Code" required>
                                                <label for="floatingPassword">Membership Code [Ex. AXX-157]</label>
                                            </div>
                                        </div>
                                        <div class="buttons">
                                            <br><br>
                                            <button type="submit" class="btn btn-primary">Verify Identity</button>
                                            <a role="button" href="index.php" class="btn btn-secondary">Back to Login</a>
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

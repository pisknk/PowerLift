<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "PowerLift";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
        if (password_verify($password, $row['password'])) {
            // check if the user has an active subscription
            if ($row['subscription_end_date'] != null && strtotime($row['subscription_end_date']) > time()) {
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $row['role'];

                if ($_SESSION['role'] == 'admin') {
                    header("Location: dashboard/admin.php");
                    exit();
                } elseif ($_SESSION['role'] == 'users') {
                    $_SESSION['firstName'] = $row['firstName'];
                    $_SESSION['lastName'] = $row['lastName'];
                    $_SESSION['activationCode'] = $row['activation_code'];
                    $_SESSION['tier'] = $row['tier'];

                    // visit history
                    $visit_date = date("Y-m-d");
                    $time_in = date("H:i:s");

                    $sql = "INSERT INTO visit_history (user_email, visit_date, time_in) VALUES (?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sss", $email, $visit_date, $time_in);
                    $stmt->execute();
                    $stmt->close();

                    header("Location: hello/index.php");
                    exit();
                } else {

                }
            } else {
                $_SESSION['email'] = $email;
                $_SESSION['firstName'] = $row['firstName'];
                $_SESSION['lastName'] = $row['lastName'];
                $_SESSION['activationCode'] = $row['activation_code'];
                $_SESSION['tier'] = $row['tier'];
                header("Location: hello/nosub.php");
                exit();
            }
        } else {
            // browser alert for incorrect email or password
            echo '<script>alert("Incorrect email or password. Please try again."); window.location.href = "index.php";</script>';
            exit();
        }
    } else {
        // browser alert for incorrect email or password
        echo '<script>alert("Incorrect email or password. Please try again."); window.location.href = "index.php";</script>';
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
    <title>Welcome to PowerLift!</title>
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
                                <img src="img/hello.webp" class="hello">
                                <br><br>
                                <h1>Say hello</h1>
                                <h1>to a new you.</h1>

                            </div>

                            <div class="col"> <!-- continue -->
                                <div class="card maincard">
                                    <div class="card-body text-center">
                                        <div class="head">
                                            <br>
                                            <img src="img/loginlogo.png"><br><br>
                                            <p>Welcome to</p>
                                            <h3><b>Power</b>Lift</h3><br>
                                        </div>
                                        <div class="inputs">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required autofocus>
                                                <label for="floatingInput">Email address</label>
                                            </div>
                                            <div class="form-floating">
                                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                                                <label for="floatingPassword">Password</label>
                                            </div>
                                        </div>
                                        <div class="buttons">
                                            <br>
                                            <button type="submit" class="btn btn-primary">Let's Go!</button>
                                            <a role="button" href="forgot.php" class="btn btn-secondary">Forgot Password?</a>
                                            <br><br><br>
                                            <p>Don't have an account yet? <a href="signup.php"><b>Create an Account</b></a></p>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

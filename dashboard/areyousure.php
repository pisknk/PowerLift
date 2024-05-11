<?php
// Retrieve user information from URL parameters
$activation_code = $_GET["activation_code"];
$firstName = $_GET["firstName"];
$lastName = $_GET["lastName"];
$email = $_GET["email"];
$tier = $_GET["tier"];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Is this right?</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="popup.css" rel="stylesheet">
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
                                <img src="../img/pencil.webp" class="hello">
                                <br><br>
                                <h1><b>Is this right?</b></h1>
                                <p1>Please double check the provided info.</p1>

                            </div>

                            <div class="col"> <!-- continue -->
                                <div class="card maincard">
                                    <div class="card-body text-center">
                                        <div class="head">
                                            <br>
                                            <img src="../img/loginlogo.png"><br><br>
                                            <p1>The membership code provided belongs to: <br></p1><br><br><br>
                                        </div>
                                        <div class="box">
                                        <p6>Duration: <?php echo $tier; ?> Month(s)</p6> <br>
                                        <p6>Name: <?php echo $firstName . " " . $lastName; ?></p6><br>
                                        <p6>Email: <?php echo $email; ?></p6><br>
                                        </div>
                                        <div class="buttons">
                                            <br><br>
                                            <a href="process_activation.php?confirm=true&activation_code=<?php echo $activation_code; ?>" class="btn btn-primary">Yes, activate this member.</a>
                                            <a role="button" href="activate.php" class="btn btn-secondary">Nope, go back.</a>
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

<script>
    function activateMember() {
        // You can add your activation logic here
        alert("Member activated successfully!");
    }
</script>

</body>
</html>

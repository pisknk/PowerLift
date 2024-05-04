<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create a new password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>

<form action="resetter.php" method="post"> <!-- form validation -->
    <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh; margin: 0;">

        <div class="container"> <!-- Card container -->
            <div class="card backk">
                <div class="card-body">
                    <div class="container">
                        <div class="row align-items-start">

                        <div class="col"> <!-- input and controls -->
                            
                            <img src="img/create.webp" class="hello">
                            <br><br>
                            <h1>Create a new password </h1>

                        </div>

                            <div class="col"> <!-- continue -->
                                <div class="card maincard">
                                    <div class="card-body text-center">
                                        <div class="head">
                                            <br>
                                            <img src="img/loginlogo.png"><br><br>
                                            <p1>Identity has been confirmed. <br> Please create a new password.</p1><br><br><br>
                                        </div>
                                        <div class="inputs">
                                            <div class="form-floating">
                                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Create a Password" required autofocus>
                                                <label for="floatingPassword">Create a new password</label>
                                            </div>
                                        </div>
                                        <div class="buttons">
                                            <br><br>
                                            <button type="submit" class="btn btn-primary">Update Password</button>
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

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

<form action="login.php" method="post"> <!-- form validation -->
    <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh; margin: 0;">

        <div class="container"> <!-- Card container -->
            <div class="card backk">
                <div class="card-body">
                    <div class="container">
                        <div class="row align-items-start">

                            <div class="col"> <!-- input and controls -->
                            
                                <br>
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
                                            <h3>PowerLift</h3><br>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

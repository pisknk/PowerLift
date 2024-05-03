<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup to PowerLift</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="signup.css" rel="stylesheet">
  </head>
  <body>
    
    <form action="reciept.php" method="post"> <!-- form validation -->
        <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh; margin: 0;">
        
            <div class="container"> <!-- Card container -->
                <div class="card">
                    <div class="card-body">
                        <div class="container text-center">
                            <div class="row align-items-start">
                              <div class="col"> <!-- input and controls -->

                                <div class="dashes">

                                <h2>Please fill up the following:</h2>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Juan" required autofocus>
                                    <label for="firstName">First Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Dela Cruz" required>
                                    <label for="lastName">Last Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="example@website.com" required>
                                    <label for="email"><i class="bi bi-envelope-at"></i> Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="**********" required>
                                    <label for="password"><i class="bi bi-asterisk"></i> Password</label>
                                </div>

                                </div>

                                <div class="subscription">
                                    <p><b>Then choose your subscription plan:</b></p>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tier" id="inlineRadio1" value="1" required>
                                    <label class="form-check-label" for="inlineRadio1">1 Month <b>[P150]</b></label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tier" id="inlineRadio2" value="6" required>
                                    <label class="form-check-label" for="inlineRadio2">6 Months <b>[P750]</b></label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tier" id="inlineRadio3" value="12" required>
                                    <label class="form-check-label" for="inlineRadio3">1 Year <b>[P1450]</b></label>
                                  </div>
                                </div>

                            </div>

                              <div class="col"> <!-- continue -->
                                <div class="insides">
                                    <img src="img/smallogo.png"><br><br>
                                    <p1>signup for</p1>
                                    <h1>PowerLift</h1><br><br>
                                    <button type="submit" class="btn btn-primary">Continue</button>
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
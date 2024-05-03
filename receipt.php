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

                                    <h1>Payment Instructions:</h1>
                                    <p>Please show this code to the cashier and pay:</p>

                                    <div class="subscription">
                                        <p2></p2><!-- Display the activation code here -->
                                        <p3><b>MEMBERSHIP WILL START AFTER PAYMENT</b></p3>
                                    </div>

                                    <p4>Duration: <!-- show the selected tier here --></p4><br>
                                    <p5>Name: <!-- show the registered name here --></p5><br>
                                    <p6>Email: <!-- show the registered email here --></p6><br>

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
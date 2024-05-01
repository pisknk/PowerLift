<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup Form - PowerLift</title>
  <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="logo.png" alt="Logo" class="logo">
            <div class="logo-text">
                <span class="small-text">sign up for</span>
                <span class="big-text">Power Lift</span>
            </div>
        </div>
        <a href="index.php" class="go-back-button">Go Back to login</a>
        <br>
        <h1 class="sign-up-text">Please Fill Up the Following</h1>
        <form action="connect.php" method="post" class="signup-form">
          <div class="form-group">
            <input type="text" name="firstName" placeholder="First Name" name="firstname" required>
          </div>
          <div class="form-group">
            <input type="text" name="lastName" placeholder="Last Name" name="lastname" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" placeholder="Email" name="email" required>
          </div>
          <div class="form-group">
            <input type="password" name="password" placeholder="Password" name="password" required>
          </div>
          <div class="form-group">
            <button type="submit" class="submit-button">Continue</button>
          </div>
        </form>
      </div>
</body>
</html>
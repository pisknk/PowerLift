<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="logo.png" alt="Logo" class="logo-image">
<div class="wrapper">
    <h1>Say Hello <br> to a New YOU!</h1>
  <div class="login-container">
    <div class="logo">
      <h2>Welcome to</h2>
    </div>
    <h2 style="font-size: 40px;"><strong>Power</strong> Lift</h2>
    <form action="Users/index.html">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <div class="row">
        <button type="submit">Let's Go!</button>
        <a href="forgot.php" class="forgot-password">Forgot Password?</a>
    </div>
    <a href="signup.php" class="create-account">Create Account</a>
</form>
  </div>
</div>

</body>
</html>
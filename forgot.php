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
    <form action="index.html" method="GET">
      <label for="username">Gmail:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Membership Code:</label>
      <input type="text" id="password" name="password" required placeholder="Membership Code (Ex: A00-052)">
    <div class="row">
        <button type="submit">Let's Go!</button>
        <a href="index.php" class="forgot-password">Back to Login</a>
    </div>
</form>
  </div>
</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subscription Form</title>
  <link rel="stylesheet" href="plan.css">
</head>
<body>
  <div class="container">
    <div class="logo-container">
      <img src="logo.png" alt="Logo" class="logo">
      <div class="logo-text">
        <span class="small-text">Sign up for</span>
        <span class="big-text">Power Lift</span>
      </div>
    </div>
    <a href="index.php" class="go-back-button">Go Back to login</a>
    <br>
    <h1 class="subscription-text">Choose Your Membership Plan</h1>
    <p class="description">
      Get unlimited access to equipment, plus a seamless way to manage your membership.
    </p>
    <hr class="line">
    <form action="reciept.php" method="post" class="subscription-form">
      <div class="options">
        <div class="option">
          <input type="radio" id="tier1" name="tier">
          <label for="tier1">₱150 - 1 Month</label>
        </div>
        <div class="option">
          <input type="radio" id="tier2" name="tier">
          <label for="tier2">₱900 - 6 Months</label>
        </div>
        <div class="option">
          <input type="radio" id="tier3" name="tier">
          <label for="tier3">₱900 - 1 Year</label>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="submit-button">Continue</button>
      </div>
    </form>
  </div>
</body>
</ht
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Email registration form</title>
  <link rel="stylesheet" href="css/register-email.css">
</head>
<body>
  <div class="email-registration-container">
    
    <h1>Email registration page</h1>
    
    <div class="confirmation">
      <h3><?php echo $confirmation ?? '' ?></h3>
    </div>
    
    <form action="index.php" method="post">
      <label for="email">Register your email address</label>
      <div class="error">
        <?php echo $errors['email'] ?? '' ?>
      </div>
      <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($_POST['email'] ?? '') ?>">
      <input type="submit" name="submit" value="Register">
    </form>

  </div>
</body>
</html>

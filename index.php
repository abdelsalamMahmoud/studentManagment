<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <div class="login-wrapper">
    <div class="login-card">
      <div class="login-header">
        <h2>SIGN IN</h2>
      </div>
      <form class="login-form" action="controllers/login.php" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter email" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter password" required>
        <button type="submit">Login</button>
         <div class="login-options">
          <p>You don't have account</p><a href="views/register.view.php">Signup</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
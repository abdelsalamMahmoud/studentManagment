<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="../css/main.css">
</head>
<body>
  <div class="login-wrapper">
    <div class="login-card">
      <div class="login-header">
        <h2>SIGN UP</h2>
      </div>
      <form class="login-form" action="../controllers/register.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Enter username" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter email" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter password" required>
        <button type="submit">Register</button>
         <div class="login-options">
          <p>You already have account</p><a href="../index.php">Login</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
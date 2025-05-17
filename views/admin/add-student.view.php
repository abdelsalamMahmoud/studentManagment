<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Student</title>
  <link rel="stylesheet" href="../../css/main.css">
</head>
<body>
  <div class="admin-container">
    <h2>Add Student</h2>
    <form action="../../controllers/add-student.php" method="POST" class="form-style">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" required>

      <label for="email">Email</label>
      <input type="email" name="email" id="email" required>

      <label for="password">Password</label>
      <input type="password" name="password" id="password" required>

      <button type="submit" class="submit-btn">Add Student</button>
    </form>
  </div>
</body>
</html>
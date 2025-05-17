<?php
    require "../../Database.php";
    $config = require "../../config.php";
    $db = new core\Database($config['database'],'root','abdelsalam30');
    $student_id = $_GET['id'] ?? 0;
    $student = $db->query("select * from users where id = :id",['id'=>$student_id])->find();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Student</title>
  <link rel="stylesheet" href="../../css/main.css">
</head>
<body>
  <div class="admin-container">
    <h2>Edit Student</h2>
    <form action="../../controllers/update-student.php" method="POST" class="form-style">
        <input type="hidden" name="id" value="<?= $student['id'] ?>">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" value="<?= $student['username'] ?>" required>

      <label for="email">Email</label>
      <input type="email" name="email" id="email" value="<?= $student['email'] ?>" required>

      <button type="submit" class="submit-btn">Edit Student</button>
    </form>
  </div>
</body>
</html>
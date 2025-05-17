<?php
$student_id = $_GET['student_id'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Grade</title>
  <link rel="stylesheet" href="../../css/main.css">
</head>
<body>
  <div class="admin-container">
    <h2>Add Grade</h2>
    <form action="../../controllers/add-grades.php" method="POST" class="form-style">
      <input type="hidden" name="student_id" value="<?= $student_id ?>">

      <label for="subject">Subject</label>
      <input type="text" name="subject" id="subject" required>

      <label for="grade">Grade</label>
      <input type="text" name="grade" id="grade" required>

      <button type="submit" class="submit-btn">Save Grade</button>
    </form>
  </div>
</body>
</html>
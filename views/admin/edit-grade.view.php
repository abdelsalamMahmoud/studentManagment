<?php
    require "../../Database.php";
    $config = require "../../config.php";
    $db = new core\Database($config['database'],'root','abdelsalam30');
    $grade_id = $_GET['id'] ?? 0;
    $grade = $db->query("select * from grades where id = :id",['id'=>$grade_id])->find();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Grade</title>
  <link rel="stylesheet" href="../../css/main.css">
</head>
<body>
  <div class="admin-container">
    <h2>Update Grade</h2>
    <form action="../../controllers/update-grade.php" method="POST" class="form-style">
      <input type="hidden" name="id" value="<?= $grade['id'] ?>">

      <label for="subject">Subject</label>
      <input type="text" name="subject" id="subject" value="<?= $grade['subject_name']?>" required>

      <label for="grade">Grade</label>
      <input type="text" name="grade" id="grade" value="<?= $grade['grade']?>" required>

      <button type="submit" class="submit-btn">update Grade</button>
    </form>
  </div>
</body>
</html>
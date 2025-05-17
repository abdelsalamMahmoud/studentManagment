<?php
session_start();
require "../../Database.php";
$config = require "../../config.php";
$db = new core\Database($config['database'], 'root', 'abdelsalam30');
$student_id = $_SESSION['student_id'];
$student = $db->query("select * from users where id = :id",['id'=>$student_id])->find();
$grades = $db->query("select * from grades where student_id = :student_id",['student_id'=>$student_id])->get();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Dashboard</title>
  <link rel="stylesheet" href="../../css/main.css">
</head>
<body>
  <div class="admin-container">
    <div class="admin-header">
      <h2>Welcome <?=$student['username']?></h2>
    </div>

    <div class="table-wrapper">
      <table class="students-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Subject</th>
            <th>Grade</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($grades as $grade): ?>
          <tr>
            <td><?= htmlspecialchars($grade['id']) ?></td>
            <td><?= htmlspecialchars($grade['subject_name']) ?></td>
            <td><?= htmlspecialchars($grade['grade']) ?></td>
          </tr>
           <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
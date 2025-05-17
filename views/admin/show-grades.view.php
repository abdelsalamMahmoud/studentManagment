<?php
  session_start();
  require "../../Database.php";
  $config = require "../../config.php";
  $student_id = $_GET['id'] ?? 0;
  $_SESSION['student_id'] = $student_id;
  $db = new core\Database($config['database'],'root','abdelsalam30');
  $student = $db->query("select * from users where id = :id",['id'=>$student_id])->find();
  $grades = $db->query("select * from grades where student_id = :student_id",['student_id'=>$student_id])->get();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Grades</title>
  <link rel="stylesheet" href="../../css/main.css">
</head>
<body>
  <div class="admin-container">
    <div class="show-grades-header">
        <h2>Grades for <?= htmlspecialchars($student['username']) ?></h2>
    
        <a href="add-grade.view.php?student_id=<?= $student_id ?>" class="add-button">+ Add Grade</a>
    </div>
    <div class="table-wrapper">
      <table class="students-table">
        <thead>
          <tr>
            <th>Subject</th>
            <th>Grade</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($grades as $grade): ?>
            <tr>
              <td><?= htmlspecialchars($grade['subject_name']) ?></td>
              <td><?= htmlspecialchars($grade['grade']) ?></td>
              <td>
                <a href="edit-grade.view.php?id=<?= $grade['id'] ?>" class="edit-btn">Edit</a>
                <a href="../../controllers/delete-grade.php?id=<?= $grade['id'] ?>" class="delete-btn">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
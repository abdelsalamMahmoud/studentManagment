<?php
require "../../Database.php";
$config = require "../../config.php";
$db = new core\Database($config['database'], 'root', 'abdelsalam30');

$searchTerm = $_GET['search'] ?? '';

$query = "SELECT * FROM users WHERE role = :role";
$params = ['role' => 'student'];

if (!empty($searchTerm)) {
    $query .= " AND (username LIKE :search OR email LIKE :search OR id = :id)";
    $params['search'] = "%$searchTerm%";
    
    if (is_numeric($searchTerm)) {
        $params['id'] = $searchTerm;
    } else {
        $params['id'] = 0; 
    }
}
$students = $db->query($query, $params)->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../../css/main.css">
</head>
<body>
  <div class="admin-container">
    <div class="admin-header">
      <h2>Student Management</h2>
      <div class="admin-actions">
        <form method="get" action="" class="search-form">
          <input type="text" name="search" placeholder="Search by name or ID" 
                value="<?= htmlspecialchars($searchTerm) ?>">
          <button type="submit">Search</button>
          <?php if (!empty($searchTerm)): ?>
              <a href="?" class="clear-search">Clear</a>
          <?php endif; ?>
      </form>
        <a href="add-student.view.php" class="add-button">+ Add Student</a>
      </div>
    </div>

    <div class="table-wrapper">
      <table class="students-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($students as $student): ?>
          <tr>
            <td><?= htmlspecialchars($student['id']) ?></td>
            <td><?= htmlspecialchars($student['username']) ?></td>
            <td><?= htmlspecialchars($student['email']) ?></td>
            <td>
                <a href="show-grades.view.php?id=<?= $student['id'] ?>" class="edit-btn">Show Grades</a>
              <a href="edit-student.view.php?id=<?= $student['id'] ?>" class="edit-btn">Edit</a>
              <a href="../../controllers/delete-student.php?id=<?= $student['id'] ?>" class="delete-btn">Delete</a>
            </td>
          </tr>
           <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
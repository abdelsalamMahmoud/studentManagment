<?php
require "../functions.php";
require "../Database.php";
require "../Response.php";
$config = require "../config.php";

// session_start();

// if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
//     header('Location: ../login.php');
//     exit;
// }

$student_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$student_id) {
    $_SESSION['error'] = "Invalid student ID";
    header('Location: ../views/admin/dashboard.view.php');
    exit;
}

$db = new core\Database($config['database'], 'root', 'abdelsalam30');

$db->query("DELETE FROM users WHERE id = :id AND role = 'student'", ['id' => $student_id]);
    
header('Location: ../views/admin/dashboard.view.php');
exit;
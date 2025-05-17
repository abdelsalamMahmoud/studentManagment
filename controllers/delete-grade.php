<?php
session_start();
require "../functions.php";
require "../Database.php";
require "../Response.php";
$config = require "../config.php";

// session_start();

// if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
//     header('Location: ../login.php');
//     exit;
// }

$grade_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$grade_id) {
    $_SESSION['error'] = "Invalid Grade ID";
    header('location: ../views/admin/show-grades.view.php?id='. urlencode($student_id));
    exit;
}

$db = new core\Database($config['database'], 'root', 'abdelsalam30');

$grade = $db->query("select * from grades where id = :id",['id'=>$grade_id])->find();
$student = $db->query("select * from users where id = :id",['id'=>$grade['student_id']])->find();

$db->query("DELETE FROM grades WHERE id = :id", ['id' => $grade_id]);
    
header('location: ../views/admin/show-grades.view.php?id='. urlencode($student['id']));
exit;
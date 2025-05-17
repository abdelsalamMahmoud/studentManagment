<?php
    session_start();
    require "../functions.php";
    require "../Database.php";
    require "../Response.php";
    require "../Validator.php";
    $config = require "../config.php";
    $db = new core\Database($config['database'],'root','abdelsalam30');
    $student_id = $_SESSION['student_id'];
    
if($_SERVER['REQUEST_METHOD']=='POST'){
    $errors=[];

    if (!$_POST['subject']) {
        $errors['subject'] = "Subject name is Required";
    }
    if (!$_POST['grade']) {
        $errors['grade'] = "Grade is Required";
    }
    if(empty($errors))
    {
        $db->query("insert into grades (subject_name,grade,student_id) values(:subject_name,:grade,:student_id)",['subject_name'=>$_POST['subject'],'grade'=>$_POST['grade'],'student_id'=>$student_id]);
        header('location: ../views/admin/show-grades.view.php?id='. urlencode($student_id));
        exit;
    }
}
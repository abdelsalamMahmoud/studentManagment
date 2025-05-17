<?php
    require "../functions.php";
    require "../Database.php";
    require "../Response.php";
    require "../Validator.php";
    $config = require "../config.php";
    $db = new core\Database($config['database'],'root','abdelsalam30');
    $id = $_POST['id'];
    $grade = $db->query("select * from grades where id = :id",['id'=>$id])->find();
    $student = $db->query("select * from users where id = :id",['id'=>$grade['student_id']])->find();
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
        $db->query("update grades set subject_name= :subject_name ,grade= :grade where id = :id",['subject_name'=>$_POST['subject'],'grade'=>$_POST['grade'],'id'=>$id]);
        header('location: ../views/admin/show-grades.view.php?id='. urlencode($student['id']));
        exit;
    }
}
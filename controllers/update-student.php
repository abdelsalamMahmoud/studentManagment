<?php
    require "../functions.php";
    require "../Database.php";
    require "../Response.php";
    require "../Validator.php";
    $config = require "../config.php";
    $db = new core\Database($config['database'],'root','abdelsalam30');
    $id = $_POST['id'];
    $student = $db->query("select * from users where id = :id",['id'=>$id])->find();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $errors=[];

       // Username validation
    if (!Validator::string($_POST['username'], 3, 50)) {
        $errors['username'] = "Username must be between 3-50 characters";
    } elseif (!Validator::username($_POST['username'])) {
        $errors['username'] = "Username can only contain letters, numbers, and underscores";
    }

     // Email validation
    if (!Validator::email($_POST['email'])) {
        $errors['email'] = "Please provide a valid email address";
    }
    
    if(empty($errors))
    {
        $db->query("update users set username= :username ,email= :email where id = :id",['username'=>$_POST['username'],'email'=>$_POST['email'],'id'=>$id]);
        header('location: ../views/admin/dashboard.view.php');
        exit;
    }
}
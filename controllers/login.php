<?php
    session_start();
     require "../functions.php";
     require "../Database.php";
     require "../Response.php";
     $config = require "../config.php";
     $db = new core\Database($config['database'],'root','abdelsalam30');

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = $db->query("select * from users where email = :email limit 1",['email'=>$email])->find();

    if($user && password_verify($password, $user['password']))
    {
        $_SESSION['user_id'] = $user['id'];

        if($user['role'] == 'admin')
        {
            header("Location: ../views/admin/dashboard.view.php");
            exit;
        }elseif($user['role'] == 'student'){
            $_SESSION['student_id'] = $user['id'];
            header("Location: ../views/student/dashboard.view.php");
            exit;
        }
        
    }else {
        echo "Invalid email or password";
    }
}
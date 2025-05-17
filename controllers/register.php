<?php
    require "../functions.php";
    require "../Database.php";
    require "../Response.php";
    require "../Validator.php";
    $config = require "../config.php";
    $db = new core\Database($config['database'],'root','abdelsalam30');
    
if($_SERVER['REQUEST_METHOD']=='POST'){
    $errors=[];

     // Username validation
    if (!Validator::string($_POST['username'], 3, 50)) {
        $errors['username'] = "Username must be between 3-50 characters";
    } elseif (!Validator::username($_POST['username'])) {
        $errors['username'] = "Username can only contain letters, numbers, and underscores";
    } else {
        // Check if username already exists
        $user = $db->query("SELECT * FROM users WHERE username = :username", [
            'username' => $_POST['username']
        ])->find();
        
        if ($user) {
            $errors['username'] = "Username already taken";
        }
    }

     // Email validation
    if (!Validator::email($_POST['email'])) {
        $errors['email'] = "Please provide a valid email address";
    } else {
        // Check if email already exists
        $user = $db->query("SELECT * FROM users WHERE email = :email", [
            'email' => $_POST['email']
        ])->find();
        
        if ($user) {
            $errors['email'] = "Email already registered";
        }
    }

     if (!Validator::string($_POST['password'], 8)) {
        $errors['password'] = "Password must be at least 8 characters";
    }

    if(empty($errors))
    {
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $db->query("insert into users (username,email,password,role) values(:username,:email,:password,:role)",['username'=>$_POST['username'],'email'=>$_POST['email'],'password'=>$password,'role'=>'student']);
        header('location: ../index.php');
        exit;
    }
}
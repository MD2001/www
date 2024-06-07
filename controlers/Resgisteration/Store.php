<?php

use Core\Validator;
use Core\App;

// session_start();
$email = $_POST["email"];

$password=$_POST["password"];

$error=[];

if(!Validator::email($email))
{
    $error["email"]= "please Enter a valid email";
}

if(!Validator::string($password,7,225))
{
    $error["password"]="please Enter valid password";
}


if(!empty($error))
{
    return view("Resgisteration/Create.view.php",
    ["error"=>$error]);
}

$dp=App::resolve('Core\Database');

$user = $dp->query("select * from users where email = :email",[
    "email" => $email
])->find();

$username=$user["name"]?? generateRandomString();


if(!empty($user))
{
    // dd("you found in data base");
    $_SESSION["logging_in"]=true;
    $_SESSION["user_info"]=[
        "email"=>$email,
        "username" =>$user["name"]
    ];
    header("Location: /");
    exit();
}
else
{
    $_SESSION["logging_in"]=true;
    $_SESSION["user_info"]=[
        "email"=>$email,
        "username" =>$username
    ];
    // dd("you dont found in data base");
    $dp->query("INSERT INTO `users` (`name`, `email`, `password`) VALUES
    (:username, :email, :password)",[
        "email" => $email,
        "password"=>$password,
        "username"=>$username
    ]);


  

    header("Location: /");
    exit();
}


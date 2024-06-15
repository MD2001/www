<?php

use Core\Validator;
use Core\App;

$dp = App::resolve('Core\Database');
// session_start();
$email = $_POST["email"];

$password=$_POST["password"];

$error = [];

if (!Validator::email($email)) {
    $error["email"] = "please Enter a valid email";
}

if (!Validator::string($password)) {
    $error["password"] = "please Enter valid password";
}


if (!empty($error)) {
    setold("email",$email);
    return view(
        "Login/Login.view.php",
        ["error" => $error]
    );
}

$user=$dp->query("select * from users where email =:email ",[
    "email"=>$email
])->find();


if(!$user)
{
  
    return view(
        "Login/Login.view.php",
        ["error" => 
            ["email" => "No muching email"]
        ]);
}


if(!password_verify($password,$user["password"]))
{
    return view(
        "Login/Login.view.php",
        ["error" => 
            ["password" => "No muching password for this email"]
        ]);
}



login([
    "email"=>$email,
    "username" =>$user["name"],
    "id"=>$user["id"]
]
);

header("Location: /");
exit();
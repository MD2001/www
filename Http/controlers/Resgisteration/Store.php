<?php

use Core\App;
use Http\Forms\LoginForms;

$email = $_POST["email"];
$password = $_POST["password"];

$form = new LoginForms();

if (!$form->Validator($email, $password)) {
    return view(
        "Resgisteration/Create.view.php",
        ["error" => $form->errors()]
    );
}




$dp = App::resolve('Core\Database');

$user = $dp->query("select * from users where email = :email", [
    "email" => $email
])->find();

$username = $user["name"] ?? generateRandomString();


if (!empty($user)) {
    // dd("you found in data base");
    login(
        [
            "email" => $email,
            "username" => $user["name"]
        ]
    );
    redirect();
} else {
    // dd("you dont found in data base");
    $dp->query("INSERT INTO `users` (`name`, `email`, `password`) VALUES
    (:username, :email, :password)", [
        "email" => $email,
        "password" => password_hash($password, PASSWORD_BCRYPT),
        "username" => $username
    ]);
    login(
        [
            "email" => $email,
            "username" => $username
        ]
    );
    redirect();
}

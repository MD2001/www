<?php

var_dump("you have been posted");

use Http\Forms\LoginForms;
use Http\Forms\Registeration;

$email = $_POST["email"];
$password = $_POST["password"];

$form = new LoginForms();

if (!$form->Validator($email, $password)) {
    return view(
        "Resgisteration/Create.view.php",
        ["error" => $form->errors()]
    );
}


$regester= new Registeration();
$regester->binding($email,$password);

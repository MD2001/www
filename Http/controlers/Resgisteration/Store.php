<?php


use Http\Forms\LoginForms;
use Http\Forms\Registeration;

$email = $_POST["email"];
$password = $_POST["password"];

$form = new LoginForms();

if (!$form->Validator($email, $password)) {
 
  $_SESSION["_flash"]["error"]=$form->errors();
  redirect("/registeration");
}


$regester= new Registeration();
$regester->binding($email,$password);

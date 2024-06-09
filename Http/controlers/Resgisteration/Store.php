<?php

use Core\Session;
use Http\Forms\LoginForms;
use Http\Forms\Registeration;

$email = $_POST["email"];
$password = $_POST["password"];

$form = new LoginForms();

if (!$form->Validator($email, $password)) {
 
  Session::flash("error",$form->errors());
  redirect("/registeration");
}


$regester= new Registeration();
$regester->binding($email,$password);

<?php


namespace Http\Forms;

use Core\App;


class Registeration
{
    public function binding($email, $password)
    {

        $user = App::resolve('Core\Database')->query("select * from users where email = :email", [
            "email" => $email
        ])->find();

        $username = $user["name"] ?? generateRandomString();

        if (empty($user)) {
            App::resolve('Core\Database')->query("INSERT INTO `users` (`name`, `email`, `password`) VALUES
                (:username, :email, :password)", [
                "email" => $email,
                "password" => password_hash($password, PASSWORD_BCRYPT),
                "username" => $username
            ]);
        }
 
        login([
            "email" => $email,
            "username" => $username,
            "id"=>$user["id"]??App::resolve('Core\Database')->query("select id from user where email = :email",["email"=>$email])->find()
        ]);
        redirect();
    }
}

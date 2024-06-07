<?php

namespace Http\Forms;
use Core\Validator;

class LoginForms
{
    protected $error=[];
    public function Validator($email,$password)
    {
        if (!Validator::email($email)) {
            $this->error["email"] = "please Enter a valid email";
        }

        if (!Validator::string($password, 7, 225)) {
            $this->error["password"] = "please Enter valid password";
        }


       return empty($this->error);
    }

    public function errors()
    {
        return $this->error;
    }
}
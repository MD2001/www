<?php

use Core\Session;

view("Resgisteration/Create.view.php",[
    "name_Banner" => "Create user",
    "error"=>Session::get("error")
]);
<?php


view("Resgisteration/Create.view.php",[
    "name_Banner" => "Create user",
    "error"=>$_SESSION["_flash"]["error"] ?? []
]);
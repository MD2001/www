<?php



$router ->get('/',"Home.php");
$router ->get("/about","about.php");
$router ->get("/contact","contact.php");

// $router ->get("/note","note/destroy.php");
$router ->delete("/note","note/destroy.php")->only("auth");

$router ->get("/note/create","note/create-note.php")->only("auth");
$router ->post("/note/create","note/create-note.php")->only("auth");

$router ->get("/notes", "note/notes.php")->only("auth");
$router ->post("/store", "note/store.php")->only("auth");

$router ->get("/show", "note/show.php")->only("auth");

$router ->get("/registeration", "Resgisteration/Create.php")->only("gest");
$router ->post("/registeration", "Resgisteration/Store.php")->only("gest");


$router->get("/Login","Login/Login.php")->only("gest");
$router->post("/sesstion/create","Login/sessionCreate.php")->only("gest");

$router->delete("/session","Login/destroy.php")->only("auth");

// $router ->delete("/note","note/create-note.php");
<?php



$router ->get('/',"controlers/Home.php");
$router ->get("/about","controlers/about.php");
$router ->get("/contact","controlers/contact.php");

// $router ->get("/note","controlers/note/destroy.php");
$router ->delete("/note","controlers/note/destroy.php");

$router ->get("/note/create","controlers/note/create-note.php");
$router ->post("/note/create","controlers/note/create-note.php");

$router ->get("/notes", "controlers/note/notes.php")->only("auth");
$router ->post("/store", "controlers/note/store.php");

$router ->get("/show", "controlers/note/show.php");

$router ->get("/registeration", "controlers/Resgisteration/Create.php")->only("gest");
$router ->post("/registeration", "controlers/Resgisteration/Store.php")->only("gest");


$router->get("/Login","controlers/Login/Login.php")->only("gest");
$router->post("/sesstion/create","controlers/Login/sessionCreate.php")->only("gest");

$router->delete("/session","controlers/Login/destroy.php")->only("auth");

// $router ->delete("/note","controlers/note/create-note.php");
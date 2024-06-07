<?php



$router ->get('/',"controlers/Home.php");
$router ->get("/about","controlers/about.php");
$router ->get("/contact","controlers/contact.php");

// $router ->get("/note","controlers/note/destroy.php");
$router ->delete("/note","controlers/note/destroy.php");

$router ->get("/note/create","controlers/note/create-note.php");
$router ->post("/note/create","controlers/note/create-note.php");

$router ->get("/notes", "controlers/note/notes.php");
$router ->post("/store", "controlers/note/store.php");

$router ->get("/show", "controlers/note/show.php");

$router ->get("/registeration", "controlers/Resgisteration/Create.php")->only("Gest");
$router ->post("/registeration", "controlers/Resgisteration/Store.php");

// $router ->delete("/note","controlers/note/create-note.php");
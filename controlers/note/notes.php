<?php

use Core\DataBase;

$config=base_path_requier('Config.php');


$db= new DataBase($config['database']);

// $id=array_key_exists("id",$_GET) ? $_GET["id"] : 18 ;        // this line for test the code without error

$id= $_SESSION["user_info"]["userid"]??null;

$notes=$db->query('select * from post where user_id= :id',[
    'id'=> $id
    ])->findall();


view("note/notes.view.php",[
    "name_Banner" => "My Notes",
    "notes" =>$notes
]);
<?php

use Core\DataBase;

$config = base_path_requier('Config.php');

$db = new DataBase($config['database']);


$notes = $db->query('select * from post where  id= :id', [
    'id' => $_GET["id"]
])->findOrFail();


athrauzation($notes['user_id'] === 1);


view("note/note.view.php",[
    "name_Banner" => "My Note",
    "notes" =>$notes
]);
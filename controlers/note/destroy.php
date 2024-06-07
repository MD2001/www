<?php

use Core\App;

// use Core\DataBase;

// $config = base_path_requier('Config.php');

// $db = new DataBase($config['database']);

$db = App::getContainer()->resolve(\Core\Database::class);


    $notes = $db->query('select * from post where  id= :id', [
        'id' => $_POST["id"]
    ])->findOrFail();


    athrauzation($notes['user_id'] ===1);
    
    $notes = $db->query('DELETE from post where  id= :id', [
        'id' => $_POST["id"]
    ]);

    header("Location: /notes");
    exit(); 


<?php


use Core\DataBase;

$config = base_path_requier('Config.php');

$db = new DataBase($config['database']);
$error = [];

$id= $_SESSION["user_info"]["userid"]??null;

$NoteLen = strlen($_POST["Note"]);
$discLen = strlen($_POST["Discription"]);


if ($NoteLen != 0) {
    if ($discLen != 0) {
        $db->query(
            "INSERT INTO `post` (`Note`, `user_id`, `Discription`) 
        VALUES(:Note, :id, :Discription)",
            [
                "Note" => $_POST["Note"],
                "Discription" => $_POST['Discription'],
                "id"=>$id
            ]
        );
        header("location: /notes");
        exit();
    } else {
        $error['Discription'] = "the Discrption field is empty";
    }
} else {
    $error['Note'] = "the Note field is empty";
}

view("note/create-note.view.php",[
    "name_Banner" => "Create Notes",
    "error" =>$error 
]);
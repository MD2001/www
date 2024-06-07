<?php
use Core\Containeror;
use Core\DataBase;
use Core\App;

$contaner=new Containeror();

$contaner->bind('Core\Database',function()
{
    $config=base_path_requier('Config.php');
   return new DataBase($config['database']);
});

$db=$contaner->resolve('Core\Database');

App:: setContainer($contaner);
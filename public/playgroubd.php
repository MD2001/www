<?php

use Illuminate\Support\Collection;

const BaseBase = __DIR__ . '/../';
require BaseBase."vendor/autoload.php";
require BaseBase."Core/functions.php";


$nums=new Collection([
    1,2,3,4,5,67,8,9
]);

$nums=$nums->sort();

if($nums->contains(1))
{
  echo $nums;
}
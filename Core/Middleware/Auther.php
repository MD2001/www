<?php
namespace Core\Middleware;

class Auther
{
    public function handle()
    {
        if(!$_SESSION["logging_in"]??false)
        {
            header("Location: /");
            exit();
        }
    }
}

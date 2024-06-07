<?php

namespace Core\Middleware;
class Guest
{
    public function handle()
    {
        if($_SESSION["logging_in"]??false)
        {
            header("Location: /");
            exit();
        }
    }
}
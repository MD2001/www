<?php

namespace Core\Middleware;
class Middleware
{
    const Map=[
        "gest"=>Guest::class,
        "auth"=>Auther::class
    ];

    public static function resolve($key)
    {
        if(!$key)
        {
            return;
        }
        $middleware = static::Map[$key] ?? false;
        
        if(!$middleware)
        {
            throw new \Exception("there is no middleware called '{$key}'.");
        }

        (new $middleware)->handle();
    }
}
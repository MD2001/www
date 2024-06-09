<?php

namespace Core;

class Session
{
    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    public static function get($key, $defult = null)
    {
        return $_SESSION["_flash"][$key] ?? $_SESSION[$key] ?? $defult;
    }
    public static function have($key)
    {
        return (bool)  static::get($key);
    }
    public static function flash($key, $value)
    {
        $_SESSION["_flash"][$key] = $value;
    }

    public static function unflash()
    {
        unset($_SESSION["_flash"]);
    }

    public static function flush()
    {
        $_SESSION = [];
    }

    public static function destroy()
    {
        $_SESSION = [];
        session_destroy();

        $params = session_get_cookie_params();
        setcookie("PHPSESSID", "", time() - 3600, $params['path'], $params['domain'], $params['secure '], $params['httponly']);
    }
}

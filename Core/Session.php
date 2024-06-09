<?php

namespace Core;

class Session
{
    public static function put($key,$value)
    {
        $_SESSION[$key]=$value;
    } 
    public static function get($key,$defult=null)
    {
       return $_SESSION[$key]?? $defult;
    } 
    public static function have($key)
    {
        return (bool)  static::get($key);
    } 
    public static function flash($key,$value)
    {
        $_SESSION["_flash"][$key]=$value;
    } 
    
    
}
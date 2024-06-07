<?php


namespace Core;

class App
{
    protected static $Container;
    public static function setContainer($Container)
    {
        static :: $Container = $Container;
    } 


    public static function getContainer()
    {
        return static :: $Container ;
    } 

    public static function resolve($id)
    {
        return static::getContainer(DataBase::class)->resolve($id);
    }
}
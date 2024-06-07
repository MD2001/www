<?php

namespace Core;

class Containeror
{
    protected $bindes=[];

    
    public function bind($key,$func)
    {
        $this->bindes[$key]=$func;
    }


    public function resolve($key)
    {
        if(!isset($key,$this->bindes))
        {
            throw new \Exception("we not found mach for {$key}");
        }
        else
        {
            $resolve=$this->bindes[$key];

            return call_user_func($resolve);
        }
    }
}
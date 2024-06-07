<?php

namespace Core;

class Router
{

    protected $routes = [];

    public function readRoutes()
    {
        return $this->routes;
    }
    protected function add($uri, $controller,$mode)
    {
        $this->routes[] = [
            "uri" => $uri,
            "controller" => $controller,
            "method" => $mode,
            "middleware" => null
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
       return $this->add($uri,$controller,"GET");
    }
    public function post($uri, $controller)
    {
       return $this->add($uri,$controller,"POST");
    }
    public function delete($uri, $controller)
    {
       return $this->add($uri,$controller,"DELETE");
    }
    public function put($uri, $controller)
    {
       return $this->add($uri,$controller,"PUT");
    }

    public function patch($uri, $controller)
    {
       return $this->add($uri,$controller,"PATCH");
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]["middleware"]=$key;

        return $this ; //to be able to chain ferther
    }

    public function rout($uri,$method)
    {
        foreach($this->routes as $rout)
        {
            if($rout['uri']===$uri && $rout["method"]=== strtoupper($method))
            {
                return require base_path($rout["controller"]);
            }
            
        }

       $this-> abort();
    }


    public function abort($code = 404)
    {
        http_response_code($code);
        require base_path("Views/{$code}.php");
        die();
    }
}



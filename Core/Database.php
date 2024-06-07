<?php


namespace Core;

use PDO;

class DataBase
{
    public $pdo;
    public $statment;

    public function __construct($config, $username = 'root', $password = '')
    {

        $dsn = "mysql:" . http_build_query($config, '', ';');
        $this->pdo = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
    }

    protected static function abort($code = 404)
    {
        http_response_code($code);
        require base_path("Views/{$code}.php");
        die();
    }
    public function query($query, $prames = [])
    {
        $this->statment = $this->pdo->prepare($query);

        $this->statment->execute($prames);

        return $this;
    }

    public function findall()
    {
        return $this->statment->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find()
    {
        return $this->statment->fetch(PDO::FETCH_ASSOC);
    }

    public function findallOrFail()
    {
        $result = $this->statment->fetchAll(PDO::FETCH_ASSOC);

        if (!$result) {
            abort(Response::NOT_FOUND);
        } else {
            return $result;
        }
    }
    public function findOrFail()
    {
        $result = $this->statment->fetch(PDO::FETCH_ASSOC);
        
        if (!$result) {
            abort(Response::NOT_FOUND);
        } else {
            return $result;
        }
    }
}

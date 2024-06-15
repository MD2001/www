<?php

use Core\Response;
use Core\Session;

function abort($code = 404)
{
    http_response_code($code);
    require base_path("Views/{$code}.php");
    die();
}

function dd($Copy_var)
{

    echo "<pre>";
    var_dump($Copy_var);
    echo "</pre>";
    die();
}

function urlis($url)
{
    return $_SERVER["REQUEST_URI"] === $url;
}


function athrauzation($cindition, $states = Response::UNOTHRAIZED)
{
    if (!$cindition) {

        abort($states);
    }
}

function base_path($path)
{
    return BaseBase . $path;
}
function view($path, $arrtipute = [])
{
    extract($arrtipute);
    require  base_path("Views/" . $path);
}

function base_path_requier($path)
{
    return require  base_path($path);
}

function generateRandomString($length = 16)
{
    // Define character set
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        // Append a random character from the character set
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

function login($arr)
{
    $_SESSION["logging_in"] = true;
    $_SESSION["user_info"] = [
        "email" => $arr["email"] ?? null,
        "username" => $arr["username"] ?? null,
        "userid" => $arr["id"] ?? null
    ];

    session_regenerate_id(true);    //to not let user reuse the cocke saved in the serever
}

function logout()
{
    Session::destroy();
}

function redirect($location = "/")
{
    header("Location: {$location}");
    exit();
}

function setold($key,$value)
{
    return Session::flash($key,$value);
}

function getold($key,$defult="")
{
    return Session::get($key,$defult);
}
<?php


namespace Core;

class Validator
{

    public static function string($string, $minLength = 0, $maxLength = PHP_INT_MAX) {
        $length = strlen($string);
        if ($length < $minLength) {
            return false;
        } elseif ($length > $maxLength) {
            return false;
        } else {
            return true;
        }
    
    }
    public static function email($email) {
        // Regular expression for validating an email
        $pattern = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/";
        
        // Check if the email matches the regular expression
        if (preg_match($pattern, $email)) {
            return true;
        } else {
            return false;
        }
    }
    
}
<?php

namespace App\Support;

class Session
{
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    public static function get($key)
    {
        return $_SESSION[$key];
    }

    public static function destroy($key)
    {
        unset($_SESSION[$key]);
    }
}
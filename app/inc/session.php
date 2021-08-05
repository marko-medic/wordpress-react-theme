<?php

class Session
{

    static function start()
    {
        session_start();
    }

    static function set(string $sessionName, string $sessionValue)
    {
        $_SESSION["$sessionName"] = $sessionValue;
    }
    static function remove()
    {
        session_destroy();
    }
    static function unset(string $sessionName)
    {
        unset($_SESSION["$sessionName"]);
    }
    static function get(string $sessionName)
    {
        if (isset($_SESSION["$sessionName"])) {
            return $_SESSION["$sessionName"];
        }
        return null;
    }
    static function display()
    {
        echo "<pre>
                " . print_r($_SESSION) . "
            </pre>";
    }
}

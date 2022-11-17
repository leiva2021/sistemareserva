<?php

class Data
{
    private static $instance = null;
    public static function createConnexion()
    {
        self::$instance = oci_connect('KENNETH', 'kjmoraga', 'localhost/orcl');
        if (!self::$instance) {
            $e = oci_error();
            trigger_error(htmlentities($e['message']), E_USER_ERROR);
        }
        return self::$instance;
    }
}
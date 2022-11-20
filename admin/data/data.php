<?php

class Data
{
    private static $instance = null;
    public static function createConnexion()
    {
        self::$instance = oci_connect('SYSTEM', 'Leiva12Hey', 'localhost/orcl');
        if (!self::$instance) {
            $e = oci_error();
            trigger_error(htmlentities($e['message']), E_USER_ERROR);
        }
        return self::$instance;
    }
}
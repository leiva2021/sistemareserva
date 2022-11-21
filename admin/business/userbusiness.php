<?php

include_once "../data/userdata.php";
include_once "../data/logindata.php";

class UserBusiness
{

    public static function saveUser($user)
    {
        return UserData::saveUser($user);
    }

    public static function validateCredentials($username, $passwod)
    {
        return LoginData::validateCredentials($username, $passwod);
    }
}

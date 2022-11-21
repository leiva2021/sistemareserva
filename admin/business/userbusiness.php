<?php

include_once "../data/userdata.php";

class UserBusiness
{

    public static function saveUser($user)
    {
        return UserData::saveUser($user);
    }
}

<?php

include_once "data.php";

class LoginData
{

    public static function validateCredentials($username)
    {

        $connexion = Data::createConnexion();

        $stid = oci_parse($connexion, "select Password, Role, Identification, NameUser from Users where Username='" . $username . "'");
        oci_execute($stid);


        $row = oci_fetch_array($stid, OCI_BOTH);

        $user = $username;
        $pass = $row['PASSWORD'];
        $role = $row['ROLE'];
        $identification = $row['IDENTIFICATION'];
        $name = $row['NAMEUSER'];
        $array = array(

            "user" => $user,
            "password" => $pass,
            "role" => $role,
            "identification" => $identification,
            "name" => $name
        );

        return $array;
    }
}

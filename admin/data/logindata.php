<?php

include_once "data.php";

class LoginData
{

    public static function validateCredentials($username)
    {

        $connexion = Data::createConnexion();

        $stid = oci_parse($connexion, "select Password, Role, Identification, NameUser, LastName from Users where Username='" . $username . "'");
        oci_execute($stid);


        $row = oci_fetch_array($stid, OCI_BOTH);

        $user = $username;
        $pass = $row['PASSWORD'];
        $role = $row['ROLE'];
        $identification = $row['IDENTIFICATION'];
        $name = $row['NAMEUSER'];
        $lastname = $row['LASTNAME'];
        $array = array(

            "user" => $user,
            "password" => $pass,
            "role" => $role,
            "identification" => $identification,
            "nameuser" => $name,
            "lastname" => $lastname
        );

        return $array;
    }
}

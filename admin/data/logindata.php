<?php

include_once "data.php";

class LoginData
{

    public static function validateCredentials($username, $password)
    {

        $connexion = Data::createConnexion();

        $cursor = oci_new_cursor($connexion);
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

        /*if (strcmp($pass, $password) == 0) {

            session_start();
            $_SESSION["identification"] = $identification;

            if ($role == "Client") {
                $_SESSION["user"] = $user;
                header("Location: ../../view/homepublic.php");
                //var_dump("todo bien");

            } else if ($role == "Admin") {
                $_SESSION['user'] = $user;
                header("Location: ../home.php");
            }
        } else {
            $result = "error";
        }*/

        return $array;
    }
}

<?php

include "data.php";
class UserData
{

    public static function saveUser($user)
    {

        $connexion = Data::createConnexion();
        $result = false;

        $stid = oci_parse($connexion, "select count(*) from Users");
        oci_execute($stid);
        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
            $IdUser = $row['COUNT(*)'];
        }
        $IdUser = $IdUser + 1;

        $stid2 = oci_parse($connexion, "call INSERT_USER($IdUser,'" . $user->getIdentification() . "','" . $user->getNameUser() . "','" .
            $user->getLastName() . "','" . $user->getUsername() . "','" . $user->getPassword() . "','" . $user->getRole() . "')");

        oci_execute($stid2);
        $e = oci_error($stid2);

        if ($e) {
            $result = false;
        } else {
            $result = true;
        }

        oci_free_statement($stid);
        oci_close($connexion);

        return $result;
    }


    // public static function getUser($user)
    // {

    //     $connexion = Data::createConnexion();
    //     $result = false;

        
    //     $cursor = oci_new_cursor($connexion);
    //     $stid = oci_parse($connexion, "begin GET_USER($user,:cursbv); end;");
    //     oci_bind_by_name($stid, ":cursbv", $cursor, -1, OCI_B_CURSOR);
    //     oci_execute($stid);
    //     oci_execute($cursor);

    //     while (($row = oci_fetch_array($cursor, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
    //         $user[] = array(
    //             "nameuser" => $row['NameUser'],
    //             "iduser" => $row['Identification'],
    //         );
    //     }

    //     oci_free_statement($stid);
    //     oci_free_statement($cursor);
    //     oci_close($connexion);

    //     return $user;
    // }
}

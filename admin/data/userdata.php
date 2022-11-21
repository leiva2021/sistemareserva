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
}

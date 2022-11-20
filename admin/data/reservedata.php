<?php

include_once "data.php";

class ReserveData
{

    public static function saveReserve($reserve)
    {
        $connexion = Data::createConnexion();
        $result = false;
        // Mejorar esto
        $stid = oci_parse($connexion, "select count(*) from Reserve");
        oci_execute($stid);
        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
            $reserveNumber = $row['COUNT(*)'];
        }
        $reserveNumber = $reserveNumber + 1;

        $stid2 = oci_parse($connexion, "call INSERT_RESERVE($reserveNumber,'" . $reserve->getReserveNumber() . "','" .
            $reserve->getreserveDateStart() . "','" . $reserve->getReserveDateEnd() . "','" . $reserve->getIdentification() .
            "','" . $reserve->getNameClient() . "','" . $reserve->getLastnameClient() . "','" . $reserve->getReserveQuantity() . "')");

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

    public static function getAllReserves()
    {

        $json = array();
        $connexion = Data::createConnexion();

        $cursor = oci_new_cursor($connexion);
        $stid = oci_parse($connexion, "begin LIST_RESERVE(:cursbv); end;");
        oci_bind_by_name($stid, ":cursbv", $cursor, -1, OCI_B_CURSOR);
        oci_execute($stid);
        oci_execute($cursor);  // Ejecutar el REF CURSOR como un ide de sentencia normal

        while (($row = oci_fetch_array($cursor, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
            $extra[] = array(
                "reserveNumber" => $row['RESERVENUMBER'],
                "roomNumber" => $row['ROOMNUMBER'],
                "reserveDateStart" => $row['RESERVEDATESTART'],
                "reserveDateEnd" => $row['RESERVEDATEEND'],
                "identification" => $row['IDENTIFICATION'],
                "nameClient" => $row['NAMECLIENT'],
                "lastnameClient" => $row['LASTNAMECLIENT'],
                "reserveQuantity" => $row['RESERVEQUANTITY']
            );
        }

        oci_free_statement($stid);
        oci_free_statement($cursor);
        oci_close($connexion);

        return $json;
    }

    public static function getListReserves()
    {

        $json = array();
        $connexion = Data::createConnexion();

        $cursor = oci_new_cursor($connexion);
        $stid = oci_parse($connexion, "begin LIST_RESERVE(:cursbv); end;");
        oci_bind_by_name($stid, ":cursbv", $cursor, -1, OCI_B_CURSOR);
        oci_execute($stid);
        oci_execute($cursor);  // Ejecutar el REF CURSOR como un ide de sentencia normal

        while (($row = oci_fetch_array($cursor, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
            $json['data'][] = $row;
        }

        oci_free_statement($stid);
        oci_free_statement($cursor);
        oci_close($connexion);

        return $json;
    }

    public static function updateReserve($reserve)
    {

        $connexion = Data::createConnexion();
        $result = false;
        $reserve_number = $reserve->getReserveNumber();
        $stid2 = oci_parse($connexion, "call UPDATE_RESERVE($reserve_number ,'" . $reserve->getReserveDateStart() . "','" . $reserve->getReserveDateEnd() . "','" . $reserve->getIdentification() . "','" . $reserve->getNameClient() . "','" . $reserve->getLastnameClient() . "','" . $reserve->getReserveQuantity() . "')");

        oci_execute($stid2);
        $e = oci_error($stid2);
        if ($e) {
            $result = false;
        } else {
            $result = true;
        }

        oci_close($connexion);

        return $result;
    }

    public static function deleteReserve($reserve_number)
    {

        $connexion = Data::createConnexion();
        $result = false;
        $stid2 = oci_parse($connexion, "call DELETE_RESERVE($reserve_number)");
        oci_execute($stid2);
        $e = oci_error($stid2);
        if ($e) {
            $result = false;
        } else {
            $result = true;
        }

        oci_close($connexion);
        return $result;
    }
}

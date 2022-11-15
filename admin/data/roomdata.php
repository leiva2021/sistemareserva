<?php

include_once "data.php";

class RoomData
{

    public static function saveRoom($room)
    {
        $connexion = Data::createConnexion();
        $result = false;
        // Mejorar esto
        $stid = oci_parse($connexion, "select count(*) from Room");
        oci_execute($stid);
        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
            $roomNumber = $row['COUNT(*)'];
        }
        $roomNumber = $roomNumber + 1;

        $stid2 = oci_parse($connexion, "call INSERT_ROOM($roomNumber,'" . $room->getImage() . "','" .
            $room->getDescription() . "','" . $room->getPrice() . "','" . $room->getAmountPeople() . "','" .
            $room->getIdExtra() . "')");

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

    public static function getAllRooms()
    {

        $json = array();
        $connexion = Data::createConnexion();

        $cursor = oci_new_cursor($connexion);
        $stid = oci_parse($connexion, "begin LIST_ROOMS(:cursbv); end;");
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

    public static function updateRoom($room)
    {

        $connexion = Data::createConnexion();
        $result = false;
        $room_number = $room->getRoomNumber();
        $stid2 = oci_parse($connexion, "call UPDATE_ROOM($room_number,'" . $room->getImage() . "','" .
            $room->getDescription() . "','" . $room->getPrice() . "','" . $room->getAmountPeople() . "','" .
            $room->getIdExtra() . "')");

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

    public static function deleteRoom($room_number)
    {

        $connexion = Data::createConnexion();
        $result = false;
        $stid2 = oci_parse($connexion, "call DELETE_ROOM($room_number)");
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

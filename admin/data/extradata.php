<?php

include_once "data.php";

class ExtraData
{

    public static function saveExtra($extra)
    {
        $connexion = Data::createConnexion();
        $result = false;

        $stid = oci_parse($connexion, "select count(*) from Extra");
        oci_execute($stid);
        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
            $extra_id = $row['COUNT(*)'];
        }
        $extra_id = $extra_id + 1;

        $stid2 = oci_parse($connexion, "call INSERT_EXTRA($extra_id,'" . $extra->getDescription() . "')");

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

    public static function updateExtra($extra)
    {
        $connexion = Data::createConnexion();
        $result = false;

        $extra_id = $extra->getIdExtra();

        $stid2 = oci_parse($connexion, "call UPDATE_EXTRA($extra_id,'" . $extra->getDescription() . "')");
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

    public static function deleteExtra($extra_id)
    {

        $connexion = Data::createConnexion();
        $result = false;
        $stid2 = oci_parse($connexion, "call DELETE_EXTRA($extra_id)");
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

    // Lo load select
    public static function getAllExtras()
    {

        $connexion = Data::createConnexion();

        $cursor = oci_new_cursor($connexion);
        $stid = oci_parse($connexion, "begin LIST_EXTRAS(:cursbv); end;");
        oci_bind_by_name($stid, ":cursbv", $cursor, -1, OCI_B_CURSOR);
        oci_execute($stid);
        oci_execute($cursor);  // Ejecutar el REF CURSOR como un ide de sentencia normal

        while (($row = oci_fetch_array($cursor, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
            $extra[] = array(
                "extras" => $row['IDEXTRA'],
                "descriptions" => $row['DESCRIPTIONS']
            );
        }

        oci_free_statement($stid);
        oci_free_statement($cursor);
        oci_close($connexion);

        return $extra;
    }

    public static function getListExtras(){

        $json = array();
        $connexion = Data::createConnexion();

        $cursor = oci_new_cursor($connexion);
        $stid = oci_parse($connexion, "begin LIST_EXTRAS(:cursbv); end;");
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

    
}

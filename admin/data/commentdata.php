<?php

include_once "data.php";

class CommentData
{

    public static function saveComment($comment)
    {
        $connexion = Data::createConnexion();
        $result = false;
        // Mejorar esto
        $stid = oci_parse($connexion, "select count(*) from Comments");
        oci_execute($stid);
        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
            $idcomment = $row['COUNT(*)'];
        }
        $idcomment = $idcomment + 1;

        $stid2 = oci_parse($connexion, "call INSERT_COMMENT($idcomment,'" . $comment->getIdentification() . "','" .$comment->getSentDate() . "','" . $comment->getMessage() . "')");

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

    public static function deleteComment($idcomment)
    {
        $connexion = Data::createConnexion();
        $result = false;
        $stid2 = oci_parse($connexion, "call DELETE_COMMENT($idcomment)");
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

    public static function getAllComments()
    {

        $connexion = Data::createConnexion();
        $cursor = oci_new_cursor($connexion);
        $stid = oci_parse($connexion, "begin LIST_COMMENTS(:cursbv); end;");
        oci_bind_by_name($stid, ":cursbv", $cursor, -1, OCI_B_CURSOR);
        oci_execute($stid);
        oci_execute($cursor);  // Ejecutar el REF CURSOR como un ide de sentencia normal

        while (($row = oci_fetch_array($cursor, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
            $comment[] = array(
                "nameuser" => $row['NAMEUSER'],
                "idcomment" => $row['IDCOMMENT'],
                "sentdate" => $row['SENTDATE'],
                "message" => $row['MESSAGE']
            );
        }

        oci_free_statement($stid);
        oci_free_statement($cursor);
        oci_close($connexion);

        return $comment;
    }

    public static function getListComments(){
        $json = array();
        $connexion = Data::createConnexion();

        $cursor = oci_new_cursor($connexion);
        $stid = oci_parse($connexion, "begin LIST_COMMENTS(:cursbv); end;");
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

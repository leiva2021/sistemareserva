<?php

include_once "./commentbusiness.php";
include_once "../domain/comment.php";

$option = $_POST['opc'];
$information = [];

switch ($option) {
    case 'insert':
        insertComment($_POST['userid'], $_POST['txtcomment']);
        break;

    default:
        # code...
        break;
}

function insertComment($identification, $message)
{

    $result = CommentBusiness::saveComment(new Comment(0, $identification,date('d-m-Y'), $message));
    if ($result) {
        $information['message'] = "inserted";
    } else {
        $information['message'] = "error";
    }

    echo json_encode($information);
}

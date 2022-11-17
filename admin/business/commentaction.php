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

    $result = CommentBusiness::saveComment(new Comment(0, $identification, '18/11/2022', $message));
    if ($result) {
        $information['message'] = "inserted";
    } else {
        $information['message'] = "error";
    }

    echo json_encode($information);
}

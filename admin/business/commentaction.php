<?php

include_once "./commentbusiness.php";
include_once "../domain/comment.php";

$option = $_POST['opc'];
$information = [];

switch ($option) {
    case 'insert_comment':
        insertComment($_POST['userid'], $_POST['txtcomment']);
        break;

    case 'delete':
        deleteComment($_POST['idcomment']);
        break;

    default:
        # code...
        break;
}

function insertComment($identification, $message)
{

    $result = CommentBusiness::saveComment(new Comment(0, $identification, date('d-m-Y'), $message));
    if ($result) {
        $information['message'] = "inserted";
    } else {
        $information['message'] = "error";
    }
    echo json_encode($information);
}

function deleteComment($idcomment)
{

    $result = CommentBusiness::deleteComment($idcomment);
    if ($result) {
        $information['message'] = "deleted";
    } else {
        $information['message'] = "error";
    }

    echo json_encode($information);
}

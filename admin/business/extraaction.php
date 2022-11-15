<?php

include_once "./extrabusiness.php";
include_once "../domain/extra.php";

$option = $_POST['opc'];
$information = [];

switch ($option) {
    case 'insert':
        insertExtra($_POST['description']);
        break;
    case 'edit':
        updateExtra($_POST['idextra'], $_POST['description']);
        break;
    case 'delete':
        deleteExtra($_POST['idextra']);
        break;

    default:
        # code...
        break;
}

function insertExtra($description)
{

    $result = ExtraBusiness::saveExtra(new Extra(0, $description));
    if ($result) {
        $information['message'] = "inserted";
    } else {
        $information['message'] = "error";
    }

    echo json_encode($information);
}

function updateExtra($idextra, $description)
{
    $result = ExtraBusiness::updateExtra(new Extra($idextra, $description));
    if ($result) {
        $information['message'] = "updated";
    } else {
        $information['message'] = "error";
    }

    echo json_encode($information);
}

function deleteExtra($idextra)
{
    $result = ExtraBusiness::deleteExtra($idextra);
    if ($result) {
        $information['message'] = "deleted";
    } else {
        $information['message'] = "error";
    }

    echo json_encode($information);
}

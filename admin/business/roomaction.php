<?php

include_once "./roombusiness.php";
include_once "../domain/room.php";

$option = $_POST['opc'];
$information = [];
switch ($option) {
    case "insert":

        if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/jpeg") {

            $file = $_FILES['image'];
            $fileName = $file['name'];
            $tempRoute = $file['tmp_name'];

            move_uploaded_file($tempRoute, "../images/" . $fileName);

            insertRoom($fileName, $_POST['description'], $_POST['price'], $_POST['amountpeople'], $_POST['extras']);
        }

        break;
    case "edit":

        $file = $_FILES['image'];
        $name = $file['name'];
        $tempRoute = $file['tmp_name'];

        // ! el input file viene vacio
        if ($name == '') {

            editRoom(
                $_POST['roomnumber'],
                $_POST['currentimg'],
                $_POST['description'],
                $_POST['price'],
                $_POST['amountpeople'],
                $_POST['extras']
            );
        } else {

            move_uploaded_file($tempRoute, "../images/" . $name);
            editRoom(
                $_POST['roomnumber'],
                $name,
                $_POST['description'],
                $_POST['price'],
                $_POST['amountpeople'],
                $_POST['extras']
            );
        }

        break;
    case "delete":
        deleteRoom($_POST['room_number']);
        break;
}

function insertRoom($image, $description, $price, $amountpeople, $idextras)
{

    $result = RoomBusiness::saveRoom(new Room(0, $image, $description, $price, $amountpeople, $idextras));
    if ($result) {
        $information['message'] = "inserted";
    } else {
        $information['message'] = "error";
    }

    echo json_encode($information);
}

function editRoom($roomNumber, $image, $description, $price, $amountpeople, $idextras)
{
    $result = RoomBusiness::updateRoom(new Room($roomNumber, $image, $description, $price, $amountpeople, $idextras));
    if ($result) {
        $information['message'] = "updated";
    } else {
        $information['message'] = "error";
    }

    echo json_encode($information);
}

function deleteRoom($room_number)
{

    $result = RoomBusiness::deleteRoom($room_number);
    if ($result) {
        $information['message'] = "deleted";
    } else {
        $information['message'] = "error";
    }
    echo json_encode($information);
}

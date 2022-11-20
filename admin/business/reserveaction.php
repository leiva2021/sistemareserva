<?php

include_once "./reservebusiness.php";
include_once "../domain/reserve.php";


/*$result = ReserveBusiness::saveReserve(new Reserve(0, 1, '21-11-2022', '22-11-2022', '708960356', 'Hiago', 'Sanchez Leiva', 3));
echo $result;*/


$option = $_POST['opc'];
$information = [];
switch ($option) {
    case "insert":

        insertReserve(
            $_POST['roomNumber'],
            $_POST['reserveDateStart'],
            $_POST['reserveDateEnd'],
            $_POST['identification'],
            $_POST['nameClient'],
            $_POST['lastnameClient'],
            $_POST['reserveQuantity']
        );

        break;
    case "edit":

        editReserve(
            $_POST['reservenumber'],
            $_POST['reserveDateStart'],
            $_POST['reserveDateEnd'],
            $_POST['identification'],
            $_POST['nameClient'],
            $_POST['lastnameClient'],
            $_POST['reserveQuantity']
        );



        break;
    case "delete":
        deleteReserve($_POST['reserve_number']);
        break;
}

function insertReserve(
    $roomNumber,
    $reserveDateStart,
    $reserveDateEnd,
    $identification,
    $nameClient,
    $lastnameClient,
    $reserveQuantity
) {

    $result = ReserveBusiness::saveReserve(new Reserve(
        0,
        $roomNumber,
        $reserveDateStart,
        $reserveDateEnd,
        $identification,
        $nameClient,
        $lastnameClient,
        $reserveQuantity
    ));
    if ($result) {
        $information['message'] = "inserted";
    } else {
        $information['message'] = "error";
    }

    echo json_encode($information);
}

function editReserve($reserveNumber, $reserveDateStart, $reserveDateEnd, $identification, $nameClient, $lastnameClient, $reserveQuantity)
{
    $result = ReserveBusiness::updateReserve(new Reserve(
        $reserveNumber,
        0,
        $reserveDateStart,
        $reserveDateEnd,
        $identification,
        $nameClient,
        $lastnameClient,
        $reserveQuantity
    ));
    if ($result) {
        $information['message'] = "updated";
    } else {
        $information['message'] = "error";
    }

    echo json_encode($information);
}

function deleteReserve($reserve_number)
{

    $result = ReserveBusiness::deleteReserve($reserve_number);
    if ($result) {
        $information['message'] = "deleted";
    } else {
        $information['message'] = "error";
    }

    echo json_encode($reserve_number);
}

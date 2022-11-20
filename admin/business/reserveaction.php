<?php

include_once "./reservebusiness.php";
include_once "../domain/reserve.php";


$result1 = ReserveBusiness::saveReserve(new Reserve(0,'1','20-11-2022','21-11-2022', '708960356','Hiago','Sanchez Leiva', '2'));
var_dump($result1);

/*$option = $_POST['option'];
$information = [];
switch ($option) {
    case "insert":

            /* insertReserve($_POST['roomNumber'], $_POST['reserveDateStart'], $_POST['reserveDateEnd'], 
            $_POST['identification'], $_POST['nameClient'], $_POST['lastnameClient'], 
            $_POST['reserveQuantity']); */

            /*echo $_POST['roomNumber']."-".$_POST['reserveDateStart']."-".$_POST['reserveDateEnd']."-".$_POST['identification']."-".$_POST['nameClient'].
            "-".$_POST['lastnameClient']."-".$_POST['reserveQuantity'];*/

            /*insertReserve(1,'20-11-2022','21-11-2022', 
            '708960356','Hiago','Sanchez Leiva', 
            2);*/

    /* break;
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
}*/

/*function insertReserve($roomNumber, $reserveDateStart, $reserveDateEnd, $identification, $nameClient, $lastnameClient, $reserveQuantity)
{

    $result = ReserveBusiness::saveReserve(new Reserve(0, $roomNumber, $reserveDateStart, $reserveDateEnd, $identification, $nameClient, $lastnameClient, $reserveQuantity));
    /*if ($result) {
        $information['message'] = "inserted";
    } else {
        $information['message'] = "error";
    }*/

    //echo json_encode($information);

    //echo $result;
//}

/*function editReserve($reserveNumber, $reserveDateStart, $reserveDateEnd, $identification, $nameClient, $lastnameClient, $reserveQuantity)
{
    $result = ReserveBusiness::updateReserve(new Reserve($reserveNumber, 0,$reserveDateStart, $reserveDateEnd, $identification, $nameClient, $lastnameClient, $reserveQuantity));
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
    echo json_encode($information);
}*/

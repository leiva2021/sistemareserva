<?php

include_once "./userbusiness.php";
include_once "../domain/user.php";

$option = $_POST['opc'];
$information = [];

switch ($option) {
    case 'create':
        inserUser($_POST['identification'], $_POST['nameuser'], $_POST['lastname'], $_POST['username'], $_POST['password'], $_POST['cpassword'], 'Client');
        break;

    default:
        # code...
        break;
}

function inserUser($identification, $nameuser, $lastname, $username, $password, $cpassword, $role)
{

    $isEquals = ($password == $cpassword) ? true : false;

    if ($isEquals) {
        $result = UserBusiness::saveUser(new User(0, $identification, $nameuser, $lastname, $username, $password, $role));
        if ($result) {
            $information['message'] = "inserted";
        } else {
            $information['message'] = "error";
        }
        echo json_encode($information);
    }else{
        $information['message'] = "pwerror";
        echo json_encode($information);
    }

}
<?php

include_once "./userbusiness.php";
include_once "../domain/user.php";

$option = $_POST['opc'];
$information = [];

switch ($option) {
    case 'create':
        inserUser(
            $_POST['identification'],
            $_POST['nameuser'],
            $_POST['lastname'],
            $_POST['username'],
            $_POST['password'],
            $_POST['cpassword'],
            'Client'
        );
        break;

    case 'login':

        if (isset($_POST['username']) && !empty($_POST['username']) &&  isset($_POST['password']) && !empty($_POST['password'])) {

            validateCredentials($_POST['username'], $_POST['password']);
        }

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
    } else {
        $information['message'] = "pwerror";
        echo json_encode($information);
    }
}

function validateCredentials($username, $password)
{
    $result = UserBusiness::validateCredentials($username);

    if ($result["password"] == $password) {
        session_start();
        if ($result["role"] == "Client") {

            $_SESSION["name"] = $result["nameuser"];
            $_SESSION["identification"] = $result["identification"];
            $_SESSION["user"] = $result["user"];
            $_SESSION["lastname"] = $result["lastname"];
            header("Location: ../../views/homepublic.php");
        } else if ($result["role"] == "Admin") {

            $_SESSION["name"] = $result["nameuser"];
            $_SESSION["role"] = "Admin";
            header("Location: ../home.php");
        }
    } else {
        header("Location: ../index.php?status=1");
    }
}

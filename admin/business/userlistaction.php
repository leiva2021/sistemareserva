<?php
include_once "./userbusiness.php";

if (UserBusiness::getUser() != null) {
    echo json_encode(RoomBusiness::getUser());
}

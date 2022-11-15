<?php
include_once "./roombusiness.php";

if (RoomBusiness::getAllRooms() != null) {
    echo json_encode(RoomBusiness::getAllRooms());
}

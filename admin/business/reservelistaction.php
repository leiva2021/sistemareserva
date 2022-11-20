<?php
include_once "./reservebusiness.php";

echo json_encode(ReserveBusiness::getListReserves());



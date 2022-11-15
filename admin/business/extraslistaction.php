<?php

include_once "./extrabusiness.php";

if (ExtraBusiness::getListExtras() != null) {
    echo json_encode(ExtraBusiness::getListExtras());
}

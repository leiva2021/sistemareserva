<?php

include_once "./extrabusiness.php";

if (ExtraBusiness::getAllExtras() != null) {
    echo json_encode(ExtraBusiness::getAllExtras());
}

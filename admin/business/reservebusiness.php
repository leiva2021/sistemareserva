<?php

include_once "../data/reservedata.php";

class ReserveBusiness
{

    public static function saveReserve($reserve)
    {
        return ReserveData::saveReserve($reserve);
    }

    public static function getAllReserves()
    {
        return ReserveData::getAllReserves();
    }

    public static function updateReserve($reserve)
    {
        return ReserveData::updateReserve($reserve);
    }

    public static function deleteReserve($reserve_number)
    {
        return ReserveData::deleteReserve($reserve_number);
    }
}

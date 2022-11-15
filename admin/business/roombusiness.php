<?php

include_once "../data/roomdata.php";

class RoomBusiness
{

    public static function saveRoom($room)
    {
        return RoomData::saveRoom($room);
    }

    public static function getAllRooms()
    {
        return RoomData::getAllRooms();
    }

    public static function updateRoom($room)
    {
        return RoomData::updateRoom($room);
    }

    public static function deleteRoom($room_number)
    {
        return RoomData::deleteRoom($room_number);
    }
}

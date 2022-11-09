<?php

include_once "../data/roomdata.php";

class RoomBusiness{

    public static function saveRoom(){
        return RoomData::saveRoom();
    }
}
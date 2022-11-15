<?php

    include_once "../data/extradata.php";

class ExtraBusiness
{

    public static function saveExtra($extra)
    {
        return ExtraData::saveExtra($extra);
    }

    public static function updateExtra($extra)
    {
        return ExtraData::updateExtra($extra);
    }

    public static function deleteExtra($extra_id)
    {
        return ExtraData::deleteExtra($extra_id);
    }

    public static function getAllExtras()
    {
        return ExtraData::getAllExtras();
    }

    public static function getListExtras()
    {
        return ExtraData::getListExtras();
    }
}

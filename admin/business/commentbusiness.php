<?php

include_once "../data/commentdata.php";

class CommentBusiness
{


    public static function getAllComments()
    {
        return CommentData::getAllComments();
    }

    public static function saveComment($comment)
    {
        return CommentData::saveComment($comment);
    }
}

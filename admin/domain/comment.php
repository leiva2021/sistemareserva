<?php

class Comment
{
    private $IdComment;
    private $Identification;
    private $SentDate;
    private $Message;

    public function __construct($IdComment, $Identification, $SentDate, $Message)
    {
        $this->IdComment = $IdComment;
        $this->Identification = $Identification;
        $this->SentDate = $SentDate;
        $this->Message = $Message;
    }

    public function getIdComment()
    {
        return $this->IdComment;
    }

    public function getIdentification()
    {
        return $this->Identification;
    }

    public function getSentDate()
    {
        return $this->SentDate;
    }

    public function getMessage()
    {
        return $this->Message;
    }
}

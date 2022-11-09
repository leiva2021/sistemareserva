<?php

class Extra
{
    private $IdExtra;
    private $Description;

    public function __construct($IdExtra, $Description)
    {
        $this->IdExtra = $IdExtra;
        $this->Description = $Description;
    }

    public function getIdExtra()
    {
        return $this->IdExtra;
    }

    public function getDescription()
    {
        return $this->Description;
    }
}

<?php

class Reserve
{
    private $numRoom;
    private $reserveNumber;
    private $reserveDateStart;
    private $reserveDateEnd;
    private $identification;
    private $nameClient;
    private $lastnameClient;
    private $reserveQuantity;

    public function __construct($numRoom, $reserveNumber,$reserveDateStart, $reserveDateEnd, $identification, $nameClient, $lastnameClient, $reserveQuantity)
    {
        $this->numRoom = $numRoom;
        $this->reserveNumber = $reserveNumber;
        $this->reserveDateStart = $reserveDateStart;
        $this->reserveDateEnd = $reserveDateEnd;
        $this->identification = $identification;
        $this->nameClient = $nameClient;
        $this->lastnameClient = $lastnameClient;
        $this->reserveQuantity = $reserveQuantity;
    }

    public function getNumRoom()
    {
        return $this->numRoom;
    }

    public function getReserveNumber()
    {
        return $this->reserveNumber;
    }
    public function getreserveDateStart()
    {
        return $this->reserveDateStart;
    }
    public function getReserveDateEnd()
    {
        return $this->reserveDateEnd;
    }
    public function getIdentification()
    {
        return $this->identification;
    }
    public function getNameClient()
    {
        return $this->nameClient;
    }

    public function getLastnameClient()
    {
        return $this->lastnameClient;
    }
    public function getReserveQuantity()
    {
        return $this->reserveQuantity;
    }
}
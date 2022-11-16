<?php
/* ! Habitacion */
class Room
{

    private $RoomNumber;
    private $Image;
    private $Description;
    private $Price;
    private $AmountPeople;
    private $RoomAvailable;
    private $IdExtra;

    public function __construct($RoomNumber, $Image, $Description, $Price, $AmountPeople, $RoomAvailable, $IdExtra)
    {
        $this->RoomNumber = $RoomNumber;
        $this->Image = $Image;
        $this->Description = $Description;
        $this->Price = $Price;
        $this->AmountPeople = $AmountPeople;
        $this->RoomAvailable = $RoomAvailable;
        $this->IdExtra = $IdExtra;
    }

    public function getRoomNumber()
    {
        return $this->RoomNumber;
    }

    public function getImage()
    {
        return $this->Image;
    }

    public function getDescription()
    {
        return $this->Description;
    }

    public function getPrice()
    {
        return $this->Price;
    }

    public function getAmountPeople()
    {
        return $this->AmountPeople;
    }

    public function getRoomAvailable()
    {
        return $this->RoomAvailable;
    }

    public function getIdExtra()
    {
        return $this->IdExtra;
    }
}

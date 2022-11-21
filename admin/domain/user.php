<?php

class User
{

    private $IdUser;
    private $Identification;
    private $NameUser; //! Se pone asi poque el Name como tal es una palabra reservada en Oracle
    private $LastName;
    private $Username;
    private $Password;
    private $Role;

    public function __construct($IdUser, $Identification, $NameUser, $LastName, $Username, $Password, $Role)
    {
        $this->IdUser = $IdUser;
        $this->Identification = $Identification;
        $this->NameUser = $NameUser;
        $this->LastName = $LastName;
        $this->Username = $Username;
        $this->Password = $Password;
        $this->Role = $Role;
    }

    public function getIdUser()
    {
        return $this->IdUser;
    }

    public function getIdentification()
    {
        return $this->Identification;
    }

    public function getNameUser()
    {
        return $this->NameUser;
    }

    public function getLastName()
    {
        return $this->LastName;
    }

    public function getUsername()
    {
        return $this->Username;
    }

    public function getPassword()
    {
        return $this->Password;
    }

    public function getRole()
    {
        return $this->Role;
    }
}

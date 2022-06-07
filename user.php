<?php

class user{
    private $userID;
    private $userName;
    private $userPass;
    private $userMail;
    private $userAddress;
    private $userLastname;

    public function __construct($userName, $userPass, $userMail){
        $this->userName = $userName;
        $this->userPass = $userPass;
        $this->userMail = $userMail;
    }

    public function createUser($userName, $userPass, $userMail, $userAddress, $userLastname) {
        $this->userName = $userName;
        $this->userPass = $userPass;
        $this->userMail = $userMail;
        $this->userAddress = $userAddress;
        $this->userLastname = $userLastname;
    }

    /**
     * Get the value of userName
     */ 
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set the value of userName
     *
     * @return  self
     */ 
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get the value of userPass
     */ 
    public function getUserPass()
    {
        return $this->userPass;
    }

    /**
     * Set the value of userPass
     *
     * @return  self
     */ 
    public function setUserPass($userPass)
    {
        $this->userPass = $userPass;

        return $this;
    }

    /**
     * Get the value of userMail
     */ 
    public function getUserMail()
    {
        return $this->userMail;
    }

    /**
     * Set the value of userMail
     *
     * @return  self
     */ 
    public function setUserMail($userMail)
    {
        $this->userMail = $userMail;

        return $this;
    }

    /**
     * Get the value of userAddress
     */ 
    public function getUserAddress()
    {
        return $this->userAddress;
    }

    /**
     * Set the value of userAddress
     *
     * @return  self
     */ 
    public function setUserAddress($userAddress)
    {
        $this->userAddress = $userAddress;

        return $this;
    }

    /**
     * Get the value of userLastname
     */ 
    public function getUserLastname()
    {
        return $this->userLastname;
    }

    /**
     * Set the value of userLastname
     *
     * @return  self
     */ 
    public function setUserLastname($userLastname)
    {
        $this->userLastname = $userLastname;

        return $this;
    }



    /**
     * Get the value of userID
     */ 
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * Set the value of userID
     *
     * @return  self
     */ 
    public function setUserID($userID)
    {
        $this->userID = $userID;

        return $this;
    }
}


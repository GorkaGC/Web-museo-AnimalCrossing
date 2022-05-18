<?php

class user{
    private $userName;
    private $userPass;
    private $userMail;

    public function __construct($userName, $userPass, $userMail){
        $this->userName = $userName;
        $this->userPass = $userPass;
        $this->userMail = $userMail;
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



}


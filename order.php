<?php
class order{
    private $orderID;
    private $customerID;
    private $orderDate;
    private $orderStatus;

    public function __construct($orderID, $customerID, $orderDate, $orderStatus){
        $this->orderID = $orderID;
        $this->customerID = $customerID;
        $this->orderDate = $orderDate;
        $this->orderStatus = $orderStatus;
    }

    /**
     * Get the value of orderID
     */ 
    public function getOrderID()
    {
        return $this->orderID;
    }

    /**
     * Set the value of orderID
     *
     * @return  self
     */ 
    public function setOrderID($orderID)
    {
        $this->orderID = $orderID;

        return $this;
    }

    /**
     * Get the value of customerID
     */ 
    public function getCustomerID()
    {
        return $this->customerID;
    }

    /**
     * Set the value of customerID
     *
     * @return  self
     */ 
    public function setCustomerID($customerID)
    {
        $this->customerID = $customerID;

        return $this;
    }

    /**
     * Get the value of orderDate
     */ 
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * Set the value of orderDate
     *
     * @return  self
     */ 
    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    /**
     * Get the value of orderStatus
     */ 
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * Set the value of orderStatus
     *
     * @return  self
     */ 
    public function setOrderStatus($orderStatus)
    {
        $this->orderStatus = $orderStatus;

        return $this;
    }
}
?>
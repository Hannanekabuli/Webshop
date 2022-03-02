<?php

class Order {
    public $orderID;
    public $unique_code;
    public $shipperID;
    public $customerID;
    public $date;
    public $sum;

  
}

function __construct($orderID, $unique_code, $shipperID, $customerID,$date,$sum) {
    $this->orderID = $orderID;
    $this->unique_code = $unique_code;
    $this->shipperID = $shipperID;
    $this->customerID = $customerID;
    $this->date = $date;
    $this->sum = $sum;
}


?>
<?php 
class customer {
    public $fName;
    public $lName;
    public $email;
    public $phone;
    public $password;
   
    function __construct($fName, $lName, $email, $phone, $password )
    {
        $this->fName = $fName;
        $this->lName = $lName;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
    }

};

$userArray = array($fName, $lName, $email, $phone, $password );
 

?>
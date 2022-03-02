
<?php

include_once(dirname(__DIR__)."/class/createInstanceFunctions.php");
include_once(dirname(__DIR__)."/controller/mainController.php");


class CustomerController extends MainController {

    private $createFunction = "createOrderList";

    function __construct() {
        parent::__construct("customers", "Customer");
    }

    public function getAll() {
        //
    }

    public function getById($id) {
        //

    }

    public function add($data) {
        $password = md5($data->password);
        $data_info =
            "
                '$data->first_name',
                '$data->last_name',
                '$data->email',
                '$password'
            ";
        $customer = $this->database->freeQuery("INSERT INTO customers(first_name,last_name,email,password)
            VALUES($data_info)");

        setcookie('Customer-Login',$data->email,time() + 86400 * 30,'/');
        return true;

    }

    public function delete($id) {
       //
    }
    public function find($email,$password) {
        $customer = $this->database->freeQuery("SELECT * FROM customers where email = '$email'");
        if ($customer && $customer[0]['password'] == md5($password)){
            setcookie('Customer-Login',$email,time() + 86400 * 30,'/');
            return true;
        } else {
            return false;
        }
    }
    public function find_by_email($email) {
        $customer = $this->database->freeQuery("SELECT `id`,`first_name`, `last_name`, `email`, `terms` FROM customers where email = '$email'")[0];
        if ($customer){
            return $customer;
        }
    }
    public function logout() {
        setcookie('Customer-Login','',time() - 86400,'/');
        return true;

    }


}


?>
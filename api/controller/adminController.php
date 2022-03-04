<?php

include_once(dirname(__DIR__)."/class/createInstanceFunctions.php");
include_once(dirname(__DIR__)."/controller/mainController.php");


class AdminController extends MainController {

    private $createFunction = "createOrderList";

    function __construct() {
        parent::__construct("admins", "Admin");
    }

    public function getAll() {
        //
    }

    public function getById($id) {
        //

    }

    public function add($product) {

    }

    public function delete($id) {
       //
    }
    public function find($email,$password) {
        $admin = $this->database->freeQuery("SELECT * FROM admins where email = '$email'");
        if ($admin && $admin[0]['password'] == md5($password)){
            setcookie('Admin-Login',$email,time() + 86400 * 30,'/');
            return true;
        } else {
            return false;
        }
    }
    public function logout() {
        setcookie('Admin-Login','',time() - 86400,'/');
        return true;

    }


}


?>
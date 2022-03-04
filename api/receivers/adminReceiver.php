<?php

try {

    include_once(dirname(__DIR__)."/controller/adminController.php");

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        switch ($_GET['action']){
            case 'logout':
                $controller = new AdminController();
                $status = $controller->logout();
                echo json_encode($status);
                break;
        }



    } else if($_SERVER["REQUEST_METHOD"] == "POST") {
        switch ($_POST['action']){
            case 'login':
                $controller = new AdminController();
                $admin = $controller->find($_POST['email'],$_POST['password']);
                echo json_encode($admin);

                break;
        }

    }

} catch(Exception $e) {
    echo json_encode(array("Message" => $e->getMessage(), "Status" => $e->getCode()));
}

?>
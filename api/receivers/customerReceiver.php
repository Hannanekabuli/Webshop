<?php

try {

    include_once(dirname(__DIR__)."/controller/customerController.php");

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        switch ($_GET['action']){
            case 'logout':
                $controller = new CustomerController();
                $status = $controller->logout();
                echo json_encode($status);
                break;
            case 'checkLogin':
                if (isset($_COOKIE['Customer-Login'])){
                    $controller = new CustomerController();
                    echo json_encode($controller->find_by_email($_COOKIE['Customer-Login']));
                } else {
                    echo json_encode(false);
                }
                break;
                case 'getCustomers':
                    $controller = new CustomerController();

                    echo json_encode($controller->getAll());

                break;
        }
    } else if($_SERVER["REQUEST_METHOD"] == "POST") {
        switch ($_POST['action']){
            case 'login':
                $controller = new CustomerController();
                $admin = $controller->find($_POST['email'],$_POST['password']);
                echo json_encode($admin);

                break;
            case 'register':
                $controller = new CustomerController();
                $result = $controller->add((object)$_POST);
//                echo json_encode($result);
                if ($result){
                    echo json_encode(true);
                } else {
                    echo json_encode(false);

                }

                break;

        }

    }

} catch(Exception $e) {
    echo json_encode(array("Message" => $e->getMessage(), "Status" => $e->getCode()));
}

?>

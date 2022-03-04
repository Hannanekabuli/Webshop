
<?php
session_start();
try {

    include_once(dirname(__DIR__)."/controller/checkoutController.php");

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        switch ($_GET['action']){
            case 'getShippers':
                $controller = new CheckoutController();
                echo json_encode($controller->getShippers());
                break;

        }
    } else if($_SERVER["REQUEST_METHOD"] == "POST") {
        switch ($_POST['action']){
            case 'login':

                break;

        }

    }

} catch(Exception $e) {
    echo json_encode(array("Message" => $e->getMessage(), "Status" => $e->getCode()));
}

?>
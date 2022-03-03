
<?php
session_start();
try {

    include_once(dirname(__DIR__)."/controller/orderController.php");
    include_once(dirname(__DIR__)."/controller/customerController.php");

    if($_SERVER["REQUEST_METHOD"] == "GET") {

        if($_GET["action"] == "getAll") {
            $controller = new OrderController();
            echo(json_encode($controller->getAll()));
            exit;
        } else if($_GET["action"] == "getById") {
            $controller = new ProductController();
            if(!isset($_GET["id"])) {
                throw new Exception("Missing ID", 501);
                exit;
            }
            
            echo(json_encode($controller->getById((int)$_GET["id"])));
            exit;
            
        }
        if ($_GET['action'] == "getOrderDetails"){
            $controller = new OrderController();
            $order = $controller->getById($_GET['id']);
            echo json_encode($order);
//            exit;
        }
        
    } else if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST["action"] == "addOrder"){

            $controller = new OrderController();
            $customer_obj = new CustomerController();

            if (isset($_COOKIE['Customer-Login'])){
                $customer = $customer_obj->find_by_email($_COOKIE['Customer-Login']);
            } else {
                $customer = null;
            }

            $data = [
                "billing_info"=>$_POST,
                "cart"=>$_SESSION['cart'],
                "customer"=>$customer,
            ];
            $result = $controller->add($data);
            if ($result){
                session_unset();
            }
            echo json_encode($result);
        }











        if($_POST["action"] == "add2222") {

            if(!isset($_POST["product"])) {
                throw new Exception("Missing product...", 501);
                exit;
            }
            
            $controller = new ProductController();
            
            echo(json_encode($controller->add(json_decode($_POST["product"]))));
            exit;
            
        } else if($_POST["action"] == "delete") {
            
            $controller = new ProductController();

            if(!isset($_POST["id"])) {
                throw new Exception("Missing ID", 501);
                exit;
            }
            
            echo(json_encode($controller->delete((int)$_POST["id"])));
            exit;

        }

    }

} catch(Exception $e) {
    echo json_encode(array("Message" => $e->getMessage(), "Status" => $e->getCode()));
}

?>
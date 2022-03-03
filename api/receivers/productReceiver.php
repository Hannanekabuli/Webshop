<?php

try {

    include_once(dirname(__DIR__)."/controller/productController.php");

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        if($_GET["action"] == "getAll") {
            
            $controller = new ProductController();
            echo(json_encode($controller->getAll()));
            exit;
            
        }
        if($_GET["action"] == "getById") {
            
            $controller = new ProductController();

            if(!isset($_GET["id"])) {
                throw new Exception("Missing ID", 501);
                exit;
            }

            echo(json_encode($controller->getById((int)$_GET["id"])));
            exit;
            
        }
        if ($_GET['action'] == "updateProduct"){
            $controller = new ProductController();
            $result = $controller->update($_GET['id'],$_GET['quantity']);
            $response = array(
                "status"=>true,
                "id"=>$_GET['id'],
                "quantity"=>$_GET['quantity'],
            );
            echo json_encode($response);
        }
    } else if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if($_POST["action"] == "add") {

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
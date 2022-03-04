<?php
session_start();

try {

    include_once(dirname(__DIR__)."/controller/cartController.php");

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
            $_SESSION['product_ids'] = [];
            $_SESSION['cart']['products'] = [];
        }
        if($_GET["action"] == "addToCart") {
            $controller = new CartController();
            $result = $controller->addToCart($_GET['id'],(int)$_GET['quantity']);
            echo json_encode($result);
        }
        if($_GET["action"] == "getCart") {
            $controller = new CartController();
            $result = $controller->getAll();
            echo json_encode($result);
        }
        if($_GET["action"] == "deleteCart") {
            $controller = new CartController();
            $result = $controller->delete($_GET['id']);
            echo json_encode($result);
        }

    } else if($_SERVER["REQUEST_METHOD"] == "POST") {


    }

} catch(Exception $e) {
    echo json_encode(array("Message" => $e->getMessage(), "Status" => $e->getCode()));
}

?>

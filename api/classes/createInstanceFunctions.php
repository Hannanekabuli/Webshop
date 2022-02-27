<?php
$base_root = $_SERVER['DOCUMENT_ROOT']."/NyaWebshop 2/Webshop";
include_once("$base_root/classes/product.php");
include_once("$base_root/classes/order.php");

function createProduct($id, $name,$quantity, $price, $description) {

    return new Product((int)$id , $name,$quantity, $price, $description);
}
function createOrderList($orderID, $unique_code, $shipperID, $customerID , $date,$sum) {
    return new Order((int)$orderID, $unique_code, $shipperID, $customerID , $date,$sum);
}

?>
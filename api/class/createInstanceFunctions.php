<?php
include_once(dirname(__DIR__)."/class/product.php");
include_once(dirname(__DIR__)."/class/order.php");

function createProduct($id, $name,$quantity, $price, $description) {

    return new Product((int)$id , $name,$quantity, $price, $description);
}
function createOrderList($id, $first_name, $email, $mobile , $date, $sum) {
    return new Order((int)$orderID, $unique_code, $shipperID, $customerID , $date,$sum);
}

?>
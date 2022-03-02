<?php 

include_once(dirname(__DIR__)."/class/createInstanceFunctions.php");
include_once(dirname(__DIR__)."/controller/mainController.php");


class OrderController extends MainController {

    private $createFunction = "createOrderList";

    function __construct() {
        parent::__construct("orders", "Order");
    }

    public function getAll() {
        return $this->database->fetchAll($this->createFunction);
    }

    public function getById($id) {
//        $details = [];
//        $order = $this->database->freeQuery("SELECT * FROM orders where ID = $id");
//        $cards = $this->database->freeQuery("SELECT * FROM cards where unique_code = " . $order[0]['unique_code']);
//
//        $i = 0;
//        foreach ($cards as $card){
//            $product_id = $card['product_id'];
//            $product = $this->database->freeQuery("SELECT * FROM products where id = $product_id" );
//            $details['products'][$i] = $product[0];
//            $i++;
//        }
//        var_dump( count($details['products']));
//        die();
//
//        $details['general'] = $order;
//        $details['cards'] = $cards;
//        return $details;
        return $this->database->getOrderDetails($id, $this->createFunction);

    }

    public function add($data) {
        try {
        $billing_info = (object)$data['billing_info'];
        $customer = (object)$data['customer'];
        $cart = (object)$data['cart'];
        $products = $data['cart']['products'];
        $order_value =
            "
                '$billing_info->first_name',
                '$billing_info->last_name',
                '$billing_info->email',
                '$billing_info->mobile',
                '$billing_info->country',
                '$billing_info->city',
                '$billing_info->full_address',
                '$billing_info->shipping_id',
                '$customer->id',
                '$cart->total'
            ";
        // Insert To Orders Table
        $this->database->freeQuery("INSERT INTO orders(first_name,last_name,email,mobile,country,city,full_address,shipperID,customerID,total)
            VALUES ($order_value)");
        $order_id = $this->database->lastInsertID();
        // Insert Products In Order_products Table
            $product_info = '';
            $test = '';
            foreach ($products as $product){
                $product_info =
                    "
                $order_id,
                $product[product_id],
                $product[price],
                $product[quantity]
            ";

                $this->database->freeQuery("INSERT INTO order_products(order_id ,product_id,price,quantity)
                    VALUES ($product_info)");
                $old_product = $this->database->freeQuery("SELECT * FROM products where ID =".$product['product_id'])[0];
                $new_quantity = $old_product['quantity'] -  $product['quantity'];
                $this->database->freeQuery("UPDATE products set quantity = ".$new_quantity." where ID =".$product['product_id']);

            }

            return true;


        } catch(Exception $e) {
            throw new Exception("The product is not in correct format...", 500);
        }
    }

    public function delete($id) {
        return $this->database->delete($id);
    }


}


?>
<?php 

include_once(dirname(__DIR__)."/class/createInstanceFunctions.php");
include_once(dirname(__DIR__)."/controller/mainController.php");


class OrderController extends MainController {

    private $createFunction = "createOrderList";

    function __construct() {
        parent::__construct("orders", "Order");
    }

    public function getAll() {
        $orders = $this->database->freeQuery("SELECT orders.* , customers.first_name as customer_first_name, customers.last_name as customer_last_name , customers.id as customer_id FROM orders 
            LEFT JOIN customers on customers.id = orders.customerID
            order by orders.id desc");

        return $orders;
    }

    public function getById($id) {

        return $this->database->freeQuery("
            SELECT order_products.* , products.name as product_name , products.ID as product_id
                FROM order_products
                LEFT JOIN products on products.ID = order_products.product_id
                where order_products.order_id = $id
            ");
    }

    public function add($data) {
        try {
        $billing_info = (object)$data['billing_info'];
        $customer = (object)$data['customer'];
        if (!isset($customer->id)){
            $customer->id = null;
        }
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
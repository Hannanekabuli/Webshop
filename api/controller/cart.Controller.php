<?php
include_once(dirname(__DIR__)."/class/createInstanceFunctions.php");
include_once(dirname(__DIR__)."/controller/mainController.php");

class CartController extends MainController {

    private $createFunction = "createProduct";

    function __construct() {
        parent::__construct("Products", "Product");
    }

    public function getAll() {
        return $_SESSION['cart'];

    }

    public function getById($id) {
        return $this->database->fetchById($id, $this->createFunction);
    }

    public function add($product) {
        try {

            $producToAdd = createProduct(null, $product->name, $product->price, $product->description);
            return $this->database->insert($producToAdd);

        } catch(Exception $e) {
            throw new Exception("The product is not in correct format...", 500);
        }
    }
    public function addToCart($product_id,$quantity){
        // Session Define

        $product = $this->database->freeQuery("SELECT `ID`, `name`, `quantity`, `price`, `description` FROM products where ID = ".$product_id)[0];

        if (count($_SESSION['cart']['products']) > 0){
            if (in_array($product_id,$_SESSION['product_ids'])){
                for ($i=0;$i<count($_SESSION['cart']['products']);$i++){
                    if ($_SESSION['cart']['products'][$i]['product_id'] == $product_id){
                        $target_product = $this->database->freeQuery("SELECT quantity FROM products where ID = $product_id")[0];
                        $session_quantity = $_SESSION['cart']['products'][$i]['quantity'] + $quantity;
                        if ($session_quantity > $target_product['quantity']){
                            $_SESSION['cart']['products'][$i]['quantity'] = $target_product['quantity'];
                        } else {
                            $_SESSION['cart']['products'][$i]['quantity'] += $quantity;
                            $_SESSION['cart']['products'][$i]['price'] += $product['price'];
                        }
                        $_SESSION['cart']['total'] += $product['price'] * $quantity;

                    }
                }
            } else {
                array_push($_SESSION['cart']['products'], [
                    "product_id"=> $product['ID'],
                    "name"=> $product['name'],
                    "price"=> $product['price'],
                    "quantity"=> (int)$quantity,
                ]);
                $_SESSION['cart']['total'] += $product['price'] * $quantity;
                array_push($_SESSION['product_ids'],$product['ID']);
            }
        } else {
            array_push($_SESSION['cart']['products'], [
                "product_id"=> $product['ID'],
                "name"=> $product['name'],
                "price"=> $product['price'],
                "quantity"=> (int)$quantity,
            ]);
            $_SESSION['cart']['total'] += $product['price'] * $quantity;
            array_push($_SESSION['product_ids'],$product['ID']);
        }
        return $_SESSION['cart'];

    }
    public function delete($id) {
        $result = 'decreased';
        $product_price = $this->database->freeQuery("SELECT price FROM products where id = $id")[0]['price'];
        for ($i=0;$i<count($_SESSION['cart']['products']);$i++){
            if ($_SESSION['cart']['products'][$i]['product_id'] == $id){
                if ($_SESSION['cart']['products'][$i]['quantity'] > 1){
                    $_SESSION['cart']['products'][$i]['quantity']--;
                    $_SESSION['cart']['total'] -= $_SESSION['cart']['products'][$i]['price'];
                    $_SESSION['cart']['products'][$i]['price'] -= $product_price;

                } else {
                    $result = 'removed';
                    $_SESSION['cart']['total'] -= $_SESSION['cart']['products'][$i]['price'];
                    unset($_SESSION['cart']['products'][$i]);
                }

            }
        }
        return $result;
    }
    public function update($id,$quantity) {
        return $this->database->freeQuery("UPDATE products set quantity = $quantity where id = $id");
    }
    public function category_products(){
        $categories = $this->database->freeQuery("SELECT * from categories group by name");
        $result = [];
        foreach ($categories as $category){
            $category_products = $this->database->freeQuery("SELECT * FROM categorydetails where categoryID=".$category['ID']);

            $products = [];
            $i = 0;
            // Get Category Products
            while ($i < count($category_products)){
                $product_id = $category_products[$i]["productID"];
                $products[$i] =  $this->database->freeQuery("SELECT `ID`, `name`, `quantity`, `price`, `description` FROM products where ID = ".$product_id)[0];
                $i++;
            }
            $result[$category['ID']] = [
                "id"=>$category['ID'],
                "name"=>$category['name'],
                "products"=>$products,
            ];
        }

        return $result;
    }
    public function getProductAndCategoryData($categoryID) {
        $query = "SELECT * FROM PRODUCT WHERE categoryID=" . $categoryID;
        return $this->freeQuery($query);
    }   

}


?>
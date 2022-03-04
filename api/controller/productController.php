<?php

include_once(dirname(__DIR__)."/class/createInstanceFunctions.php");
include_once(dirname(__DIR__)."/controller/mainController.php");

class ProductController extends MainController {

    private $createFunction = "createOrder";

    function __construct() {
        parent::__construct("Products", "Product");
    }

    public function getAll() {
        return $this->database->fetchAll($this->createFunction);

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

    public function delete($id) {
        return $this->database->delete($id);
    }
    public function update($id,$quantity) {
        return $this->database->freeQuery("UPDATE products set quantity = $quantity where id = $id");
    }
    public function category_products(){
        $categories = $this->database->freeQuery("SELECT * from categories");

        $result = [];
        foreach ($categories as $category){
            $category_products = $this->database->freeQuery("SELECT * FROM categorydetails where categoryID=".$category['ID']);

            $products = [];
            $i = 0;
            // Get Category Products
            while ($i < count($category_products)){
                $product_id = $category_products[$i]["productID"];
                $products[$i] =  $this->database->freeQuery("SELECT `ID`, `name`, `quantity`, `price`, `description`, `image` FROM products where ID = $product_id limit 2")[0];
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

<?php
include_once(dirname(__DIR__)."/class/database.php");

abstract class MainController {

    public $database;

    function __construct($table, $class) {
        $this->database = new Database($table, $class);
    }

    abstract function getAll();
    abstract function getById($id);
    abstract function add($product);
    abstract function delete($id);
    
}

?>
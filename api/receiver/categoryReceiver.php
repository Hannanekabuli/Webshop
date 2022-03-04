<?php

try {

    include_once(dirname(__DIR__)."/controller/categoryController.php");

    if($_SERVER["REQUEST_METHOD"] == "GET") {

        if($_GET["action"] == "getAll") {

        }


    } else if($_SERVER["REQUEST_METHOD"] == "POST") {



    }

} catch(Exception $e) {
    echo json_encode(array("Message" => $e->getMessage(), "Status" => $e->getCode()));
}

?>
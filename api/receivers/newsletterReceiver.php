
<?php
try {

    include_once(dirname(__DIR__)."/controller/newsletterController.php");

    if($_SERVER["REQUEST_METHOD"] == "GET") {


        
    } else if($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST["action"] == "addNewsLetter"){

            $controller = new NewsletterController();
            $result = $controller->add($_POST);
            if ($result){
                echo  json_encode(true);
            } else {
                echo  json_encode(false);
            }

        }




    }

} catch(Exception $e) {
    echo json_encode(array("Message" => $e->getMessage(), "Status" => $e->getCode()));
}

?>
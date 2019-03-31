<?php

    session_start();
    if($_POST['orderQuantity'] <= $_POST['productQuantity']) {
        //echo var_dump($_SESSION["basketQuantity"]);
        //echo var_dump($_SESSION["basketCount"]);
        if (!isset($_SESSION["basketCount"])) {
            $_SESSION["basketCount"] = 1;
        }else{
            $_SESSION["basketCount"] = $_SESSION["basketCount"] + 1;
        }
        $basketCount = $_SESSION["basketCount"];

        $afterQuantity = (int)($_POST['productQuantity']) - (int)($_POST['orderQuantity']);
        ($afterQuantity == NULL ? $afterQuantity = 0 : '');
        include_once "../includes/db.php";
        $db = db::get();
        $queryString = "SELECT `product_name` FROM `products` WHERE id=(SELECT product_id FROM where_is_the_product WHERE id = " . $_POST["whereId"] . ")";
        $productName = $db->getRow($queryString);

        $updateString = "UPDATE `where_is_the_product` SET `quantity`=" .$afterQuantity. " WHERE id=" . $_POST["whereId"];
        $db->query($updateString);

        $_SESSION["basketProductId"][$basketCount] = $_POST["whereId"];
        $_SESSION["basketProduct"][$basketCount] = $productName["product_name"];
        $_SESSION["basketQuantity"][$basketCount] = $_POST["orderQuantity"];
        $_SESSION["basketAllProductQuantity"]++;
    }

    //echo var_dump($afterQuantity);
    //echo var_dump($updateString);
    //echo var_dump($_SESSION["basketQuantity"]);
    //echo var_dump($_SESSION["basketCount"]);
?>
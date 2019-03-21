<?php

    session_start();
    echo var_dump($_SESSION["basketQuantity"]);
    echo var_dump($_SESSION["basketCount"]);
    if(!isset($_SESSION["basketCount"])){
        $_SESSION["basketCount"] = 1;
    }
    $basketCount = $_SESSION["basketCount"];

    include_once "../includes/db.php";
    $db = db::get();
    $queryString = "SELECT `product_name` FROM `products` WHERE id=(SELECT product_id FROM where_is_the_product WHERE id = ".$_POST["productId"].")";
    $productName = $db->getRow($queryString);

    $_SESSION["basketProductId"][$basketCount] = $_POST["productId"];
    $_SESSION["basketProduct"][$basketCount] = $productName["product_name"];
    $_SESSION["basketQuantity"][$basketCount] = $_POST["orderQuantity"];
    $_SESSION["basketCount"] = $_SESSION["basketCount"] + 1;

    echo var_dump($_SESSION["basketProduct"]);
    echo var_dump($_SESSION["basketQuantity"]);
    echo var_dump($_SESSION["basketCount"]);
?>
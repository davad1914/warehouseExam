<?php
    session_start();
    include_once "../includes/db.php";
    $db = db::get();

    $queryString = "";

    for($i = 1; $i < $_SESSION["basketCount"]; $i++){
        $queryString .= "INSERT INTO `delivery`(`delivery_user`, `delivery_company`, `delivery_product`, `delivery_quantity`, `delivery_address`) 
                        VALUES (".$_SESSION["user_id"].", )"
    }















    $_SESSION["basketProductId"][$basketCount] = $_POST["productId"];
    $_SESSION["basketProduct"][$basketCount] = $productName["product_name"];
    $_SESSION["basketQuantity"][$basketCount] = $_POST["orderQuantity"];
    $_SESSION["basketCount"] = $_SESSION["basketCount"] + 1;

<?php

    include_once "includes/db.php";

    $db = db::get();
    $productDetailString = "SELECT product_price, product_vat FROM products WHERE id=(SELECT product_id FROM where_is_the_product WHERE id=".$_SESSION["basketProductId"][$i].")";
    $result = $db->getRow($productDetailString);
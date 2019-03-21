<?php

    $receiveId = $_POST["receiveId"];
    $queryString = "SELECT products.product_name, where_is_the_product.quantity FROM products, where_is_the_product WHERE products.id = where_is_the_product.product_id AND where_is_the_product.receive_id = ".$receiveId;
    include_once "db.php";
    $db = db::get();
    $row = $db->getArray($queryString);
    $output = '<table class="table"><thead><tr><th>Termék</th><th>Darabszám</th></tr></thead><tbody>';
    foreach($row as $listItem){
        $output .= "<tr><th>".$listItem["product_name"]."</th><td>".$listItem["quantity"]."</td></tr>";
    }
    $output .= "</tbody></table>";
    echo $output;
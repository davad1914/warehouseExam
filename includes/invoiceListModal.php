<?php

$deliveryId = $_POST["invoiceId"];
$queryString = "SELECT products.product_name, delivery.delivery_quantity FROM products, delivery WHERE products.id = delivery.delivery_product AND delivery.delivery_invoice = ".$deliveryId;
include_once "db.php";
$db = db::get();
$row = $db->getArray($queryString);
$output = '<table class="table"><thead><tr><th>Termék</th><th>Darabszám</th></tr></thead><tbody>';
foreach($row as $listItem){
    $output .= "<tr><th>".$listItem["product_name"]."</th><td>".$listItem["delivery_quantity"]."</td></tr>";
}
$output .= "</tbody></table>";
echo $output;
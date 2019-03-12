<?php
include_once "db.php";
$db = db::get();
$queryString = "SELECT `product_item_number`, `product_name`, `id` FROM `products`";
$products = $db->getArray($queryString);

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($products as $item) {
        if (stristr($q, substr($item["product_item_number"], 0, $len))) {
            if ($hint === "") {
                $hint = '<a class="dropdown-item" value='.$item["id"].'>'.$item["product_name"].'</li>';
                //class="list-group-item list-group-item-dark list-group-item-action"
            } else {
                $hint .= '<li class="dropdown-item" value='.$item["id"].'>'.$item["product_name"].'</li>';
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "" : $hint;
?>
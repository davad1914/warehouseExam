<?php
include_once "db.php";
$db = db::get();  //a db classon belül a get function-t hívjuk meg, ami példányosítja a db class-t

    if(isset($_GET["productId"]) && $_GET["prouctId"] != ""){
        $unitQuerystring = "SELECT * FROM `products` WHERE product_id = ".$_GET["productId"];
        $unit = $db->getArray($unitQuerystring);
    }
    //A querystring-et berakjuk egy getArray-be, ami tömbket hoz létre. Ezen foreach-el megyünk végig.
    $categoryQuerystring = "SELECT * FROM `product_category` ORDER BY `category_name` ASC";
    $category = $db->getArray($categoryQuerystring);

    $manufacturerQuerystring = "SELECT * FROM `product_manufacturer` ORDER BY `manufacturer_name` ASC";
    $manufacturer = $db->getArray($manufacturerQuerystring);

    $unitQuerystring = "SELECT * FROM `unit_type` ORDER BY `unit_name` ASC";
    $unit = $db->getArray($unitQuerystring);

    //MODAL-os INSERT parancsok :)
        
    //MODAL-os INSERT parancsok vége :(
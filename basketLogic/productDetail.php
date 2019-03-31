<?php

    include_once "includes/db.php";

    $db = db::get();
    $productDetailString = "SELECT product_price, product_vat FROM products WHERE id=(SELECT product_id FROM where_is_the_product WHERE id=".$_SESSION["basketProductId"][$i].")";
    $result = $db->getRow($productDetailString);

    $productStockDetailString = "SELECt stock_places.stock_name, aisle.aisle_number, racks.rack_number, shelf.shelf_number, bin.bin_number FROM where_is_the_product, stock_places, aisle, racks, shelf, bin WHERE bin.bin_shelf=shelf.shelf_id AND shelf.shelf_rack=racks.rack_id AND racks.rack_aisle=aisle.aisle_id AND aisle.aisle_stock_place=stock_places.stock_id AND where_is_the_product.bin_id=bin.bin_id AND where_is_the_product.id = ".$_SESSION["basketProductId"][$i];
    $stockResult = $db->getRow($productStockDetailString);
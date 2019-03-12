<?php
    include_once "../includes/db.php";
    $db = db::get();
    $updateString = "UPDATE `stock_places` SET `stock_name`='".$_GET['stockName']."',`stock_address`='".$_GET['stockPlace']."' 
                    WHERE `stock_id` =".$_GET["insertStockButton"];
    $db->query($updateString);
    header("Location: ../stockList.php?success=".$_GET["insertStockButton"]);
<?php
    include_once "../includes/db.php";
    $db = db::get();
    $updateString = "UPDATE `stock_places` SET `stock_name`='".$db->escape($_GET['stockName'])."',`stock_address`='".$db->escape($_GET['stockPlace'])."' 
                    WHERE `stock_id` =".$_GET["insertStockButton"];
    $db->query($updateString);
    header("Location: ../stockList.php?success=".$_GET["insertStockButton"]);
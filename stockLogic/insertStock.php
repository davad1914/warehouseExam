<?php

    if(isset($_GET["insertStockButton"])){
        if($_GET["stockName"] != "" && $_GET["stockPlace"] != ""){
            include_once "../includes/db.php";
            $db = db::get();
            $insertQueryString = "INSERT INTO `stock_places`(`stock_name`, `stock_address`) VALUES ('".$_GET['stockName']."', '".$_GET['stockPlace']."')";
            $db->query($insertQueryString);
            header("Location: ../stockList.php?msg=success");
        }else{
            header("Location: ../createStockPlace.php?msg=empty");
        }
    }

?>
<?php

session_start();

$queryString = "";
include_once "../includes/db.php";
$db = db::get();

$pdfFileName = $_SESSION["username"]."-".rand(1,100)."-".date("Y-m-d").".pdf";

$receiveQueryString = "INSERT INTO `receive`(`receive_user`, `receive_pdf`) VALUES (".$db->escape($_SESSION["user_id"]).", '".$db->escape($pdfFileName)."')";
$db->query($receiveQueryString);


for($i = 1; $i < $_SESSION["count"]; $i++){
    $queryString =
    " INSERT INTO `where_is_the_product`(`product_id`, `stock_id`, `bin_id`, `receive_id`, `quantity`) VALUES ((SELECT id FROM `products` WHERE product_item_number = '".$db->escape($_SESSION["productNumber"][$i])."'),".$db->escape($_SESSION["stockName"][$i])." ,".$db->escape($_SESSION["bin"][$i]).", (SELECT receive_id FROM `receive` WHERE `receive_pdf`='".$db->escape($pdfFileName)."' ), ".$db->escape($_SESSION["productQuantity"][$i]).");";
    $db->query($queryString);
}

include_once "../invoice/receiveInvoice.php";

include_once "unsetSession.php";

header('Location: ../supplyList.php');
exit();

//var_dump($queryString);
//var_dump($_SESSION["count"]);

?>
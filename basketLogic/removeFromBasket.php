<?php

session_start();
include_once "../includes/db.php";
$db = db::get();
$selectString = "SELECT quantity FROM where_is_the_product WHERE id = ".$_SESSION["basketProductId"][$_GET["item"]];
$quantity = $db->getRow($selectString);

$allQuantity = (int)($_SESSION["basketQuantity"][$_GET["item"]]) + (int)($quantity['quantity']);

$updateString = "UPDATE `where_is_the_product` SET `quantity`=".$db->escape($allQuantity)." WHERE id=".$db->escape($_SESSION["basketProductId"][$_GET["item"]]);
$db->query($updateString);

$_SESSION["basketCount"] = (int)($_SESSION["basketCount"]) - 1;
unset($_SESSION["basketProductId"][$_GET["item"]]);
unset($_SESSION["basketProduct"][$_GET["item"]]);
unset($_SESSION["basketQuantity"][$_GET["item"]]);

//var_dump($updateString);
//var_dump($_SESSION["basketProductId"]);

header('Location: ../basketList.php?msg=successRemove');
<?php

session_start();
include_once "../includes/db.php";
$db = db::get();
$selectString = "SELECT quantity FROM where_is_the_product WHERE id = ".$_SESSION["basketProductId"][$_GET["item"]];
$quantity = $db->getRow($selectString);

$allQuantity = (int)($_SESSION["basketQuantity"][$_GET["item"]]) + (int)($quantity['quantity']);

$updateString = "UPDATE `where_is_the_product` SET `quantity`=".$allQuantity." WHERE id=".$_SESSION["basketProductId"][$_GET["item"]];
$db->query($updateString);

unset($_SESSION["basketProductId"][$_GET["item"]]);
unset($_SESSION["basketProduct"][$_GET["item"]]);
unset($_SESSION["basketQuantity"][$_GET["item"]]);
$_SESSION["basketCount"] = $_SESSION["basketCount"] - 1;

//var_dump($updateString);
//var_dump($_SESSION["basketProductId"]);

header('Location: ../basketList.php?msg=successRemove');
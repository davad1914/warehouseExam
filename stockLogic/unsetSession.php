<?php

session_start();

unset($_SESSION["productName"]);
unset($_SESSION["productNumber"]);
unset($_SESSION["stockName"]);
unset($_SESSION["aisle"]);
unset($_SESSION["rack"]);
unset($_SESSION["shelf"]);
unset($_SESSION["bin"]);
unset($_SESSION["count"]);

header("Location: ../addProductToStock.php");
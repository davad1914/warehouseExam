<?php

session_start();

unset($_SESSION["basketProductId"][$_GET["item"]]);
unset($_SESSION["basketProduct"][$_GET["item"]]);
unset($_SESSION["basketQuantity"][$_GET["item"]]);

header('Location: ../basketList.php?msg=successRemove');
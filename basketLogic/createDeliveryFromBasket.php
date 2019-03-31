<?php
    session_start();
    include_once "../includes/db.php";
    $db = db::get();
    $pdfFileName = "invoice-".$_SESSION["username"]."-".rand(1,100)."-".date("Y-m-d-h-i-s").".pdf";

    if($_POST['customerName'] != "" && $_POST['country'] != "" && $_POST['zip'] != "" && $_POST['city'] != "" && $_POST['streetAddress'] != "") {

        $invoiceInsertString = "
            INSERT INTO `invoice`(`invoice_user`, `invoice_customer_name`, `delivery_country`, `delivery_address`, `invoice_pdf`) 
            VALUES (
              ".$_SESSION['user_id'].",
              '".$_POST["customerName"]."',
              '".$_POST["country"]."',
              '".$_POST["zip"]."-".$_POST["city"]."-".$_POST["streetAddress"]."',
              '".$pdfFileName."'
            )
        ";
        $db->query($invoiceInsertString);

        $invoiceIdString = "SELECT invoice_id FROM invoice WHERE invoice_pdf='".$pdfFileName."'";
        $invoiceId = $db->getRow($invoiceIdString);

        for ($i = 1; $i < $_SESSION["basketCount"]; $i++) {

            $productIdQueryString = "SELECT product_id FROM where_is_the_product WHERE id =" . $_SESSION['basketProductId'][$i];
            $productIdResult = $db->getRow($productIdQueryString);

            $insertQueryString = "
                  INSERT INTO `delivery`(`delivery_user`, `delivery_product`, `delivery_quantity`, `delivery_invoice`) 
                  VALUES (
                    " . $_SESSION["user_id"] . ",
                    " . $productIdResult['product_id'] . ",
                    " . $_SESSION['basketQuantity'][$i] . ",
                    " . $invoiceId['invoice_id'] . "
            )";
            $db->query($insertQueryString);
        }


        if ($_POST['isChecked'] === "true") {
            include_once "../invoice/deliveryInvoiceSame.php";
        } elseif ($_POST['isChecked'] === "false") {
            include_once "../invoice/deliveryInvoice.php";
        }
    }

    unset($_SESSION["basketProductId"]);
    unset($_SESSION["basketProduct"]);
    unset($_SESSION["basketQuantity"]);
    unset($_SESSION["basketCount"]);

    //var_dump($pdfFileName);
    //var_dump($invoiceInsertString);
    //var_dump($invoiceIdString);
    //var_dump($productIdQueryString);
    //var_dump($insertQueryString);
    //var_dump($invoiceId);
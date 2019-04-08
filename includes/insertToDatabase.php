<?php

include_once "db.php";
$db = db::get();


    /*$modalInput = $_GET["modalInput"];
    $queryString = "INSERT INTO `product_category`(`category_name`) VALUES ('".$modalInput."')";
    $db->query($queryString);
    header('Location: ../newProduct.php?msg=success');*/

    if(isset($_GET["action"]) && $_GET["action"] != ""){
        if (isset($_GET["text"]) && $_GET["text"] != "" && $_GET["action"] == "category") {
            $modalInput = $db->escape($_GET["text"]);
            $queryString = "INSERT INTO `product_category`(`category_name`) VALUES ('".$modalInput."')"; 
        }elseif(isset($_GET["text"]) && $_GET["text"] != "" && isset($_GET["text2"]) && $_GET["text2"] != "" && $_GET["action"] == "unit"){
            $unitName = $db->escape($_GET["text"]);
            $shortUnitName = $db->escape($_GET["text2"]);
            $queryString = "INSERT INTO `unit_type`(`unit_name`, `unit_short_name`) VALUES ('".$unitName."', '".$shortUnitName."')";
        }elseif(isset($_GET["text"]) && $_GET["text"] != "" && $_GET["action"] == "manufacturer"){
            $manufacturerName = $db->escape($_GET["text"]);
            $manufacturerAddress = $db->escape(($_GET["text2"] != "" ? $_GET["text2"] : null));
            $manufacturerEmail = $db->escape(($_GET["text3"] != "" ? $_GET["text3"] : null));
            $queryString = "INSERT INTO `product_manufacturer`(`manufacturer_name`, `manufacturer_address`, `manufacturer_email`) VALUES ('".$manufacturerName."', '".$manufacturerAddress."', '".$manufacturerEmail."')";
        }
        if(isset($queryString) && $queryString != ""){
            $db->query($queryString);
            header('Location: ../newProduct.php?msg=success');
        }else{
            header('Location: ../newProduct.php?msg=error');
        }
    }

    //////////////////////////////////////////////product inzertálása nagyba//////////////////////////////////////////////////////////////
    if(isset($_POST["saveButton"])){
        $product_name = $db->escape($_POST["product_name"]);
        $product_description = $db->escape($_POST["product_description"]);
        $product_item_number = $db->escape($_POST["product_item_number"]);
        $product_barcode = $db->escape($_POST["product_barcode"]);
        $product_category = $db->escape($_POST["product_category"]);
        $product_manufacturer = $db->escape($_POST["product_manufacturer"]);
        $product_unit = $db->escape($_POST["product_unit"]);
        $product_price = $db->escape($_POST["product_price"]);
        $product_vat = $db->escape($_POST["product_vat"]);
        $product_image = $db->escape(($_FILES["productImage"]["name"] != "" ? $_FILES["productImage"]["name"] : "default.jpg"));

            if(
                empty($product_name) ||
                empty($product_description) ||
                empty($product_item_number) ||
                empty($product_barcode) ||
                empty($product_category) ||
                empty($product_manufacturer) ||
                empty($product_unit) ||
                empty($product_price) ||
                empty($product_vat)
            ){
                header('Location: newProduct.php?error=empty');    
            }else{
                $insertQueryString = "
                INSERT INTO `products`
                (`product_name`, `product_description`, `product_item_number`, `product_barcode`, `product_category`, `product_manufacturer`, `product_unit`, `product_price`, `product_vat`, `product_image_url`) 
                VALUES (
                    '".$product_name."',
                    '".$product_description."',
                    '".$product_item_number."',
                    '".$product_barcode."',
                    ".$product_category.",
                    ".$product_manufacturer.",
                    ".$product_unit.",
                    ".$product_price.",
                    '".$product_vat."%',
                    'img/".$product_image."'
                )
                ";
                if($db->query($insertQueryString)){
                    header('Location: newProduct.php?msg=success');
                }else{
                    header('Location: newProduct.php?error=db');
                }
            }
        

        // In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
        // of $_FILES.
        //Uploading picture for product
        
        $errorMsg = " ";
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["productImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["saveButton"])) {
            $check = getimagesize($_FILES["productImage"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $errorMsg = $errorMsg + "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["productImage"]["size"] > 500000) {
            $errorMsg = $errorMsg + "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            $errorMsg = $errorMsg + "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            $errorMsg = $errorMsg + "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file)) {
                $errorMsg = $errorMsg + "The file ". basename( $_FILES["productImage"]["name"]). " has been uploaded.";
            } else {
                $errorMsg = $errorMsg + "Sorry, there was an error uploading your file.";
            }
        }
    }

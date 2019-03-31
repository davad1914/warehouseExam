<?php

    $searchInput = $_POST["searchInput"];
    $manufacturer = $_POST["manufacturer"];
    $category = $_POST["category"];

    include_once "../includes/db.php";
    $db = db::get();
    $queryString = "SELECT * FROM `products` 
    WHERE `product_name` LIKE '%".$searchInput."%'";

    $result = $db->getArray($queryString);
    foreach ($result as $listItem){
        echo '
            <div class="col-sm-6 col-lg-3 card-bottom">
                <div class="card" style="width: 100%; height: 100%;">
                    <div class="product-image-container">
                        <img src="'.$listItem["product_image_url"].'" class="card-img-top img-fluid product-image" alt="">
                    </div>
                    <div class="card-body product-description">
                        <h6 class="card-title">'.$listItem["product_name"].'</h6>
                        <p>'.$listItem["product_description"].'</p>
                        <p><b>'.$listItem["product_price"].' Ft'.'</b></p>
                        <div><small>Áfa: '.$listItem["product_vat"].'</small></div>
                        <a href="viewProduct.php?product='.$listItem["id"].'" class="btn btn-primary">Részlet</a>
                    </div>
                </div>
            </div>
        ';
    }



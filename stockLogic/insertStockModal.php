<?php

session_start();

/////////////////////////////////////////////////////insertelések////////////////////////////////////////////////////////////////////

if(isset($_POST['aisleCompany']) && isset($_POST['aisleName'])){
    $response = "";
    include_once "../includes/db.php";
    $db = db::get();
    $queryString = "INSERT INTO `aisle`(`aisle_stock_place`, `aisle_number`) VALUES (".$db->escape($_POST['aisleCompany']).", '".$db->escape($_POST['aisleName'])."')";
    $db->query($queryString);

    $aisleQueryString = "SELECT * FROM `aisle` WHERE `aisle_stock_place` = ".$_POST['aisleCompany']." AND `aisle_number` = '".$_POST['aisleName']."'";
    $aisle = $db->getRow($aisleQueryString);

       $response .= "<option selected value=".$aisle["aisle_id"].">".$aisle["aisle_number"]."</option>";

    echo $response;
}

if(isset($_POST["rackAisle"]) && isset($_POST["rackName"]) && isset($_POST["action"]) && $_POST["action"] == "insertRack"){
   $response = "";
   include_once "../includes/db.php";
   $db = db::get();
   $insertQueryString = "INSERT INTO `racks`(`rack_aisle`, `rack_number`) VALUES (".$db->escape($_POST["rackAisle"]).", '".$db->escape($_POST["rackName"])."')";
   $db->query($insertQueryString);

   $rackQueryString = "SELECT * FROM `racks` WHERE `rack_aisle` = ".$_POST["rackAisle"]." AND `rack_number` = '".$_POST["rackName"]."'";
   $rack = $db->getRow($rackQueryString);

      $response .= "<option selected value=".$rack["rack_id"].">".$rack["rack_number"]."</option>";

   echo $response;
}

if(isset($_POST["shelfName"]) && isset($_POST["shelfRack"]) && isset($_POST["action"]) && $_POST["action"] == "insertShelf"){
   $response = "";
   include_once "../includes/db.php";
   $db = db::get();
   $insertQueryString = "INSERT INTO `shelf`(`shelf_rack`, `shelf_number`) VALUES (".$db->escape($_POST["shelfRack"]).", '".$db->escape($_POST["shelfName"])."')";
   $db->query($insertQueryString);

   $shelfQueryString = "SELECT * FROM `shelf` WHERE `shelf_rack` = ".$_POST["shelfRack"]." AND `shelf_number` = '".$_POST["shelfName"]."'";
   $shelf = $db->getRow($shelfQueryString);

      $response .= "<option selected value=".$shelf["shelf_id"].">".$shelf["shelf_number"]."</option>";

   echo $response;
}

if(isset($_POST["binName"]) && isset($_POST["binShelf"]) && isset($_POST["action"]) && $_POST["action"] == "insertBin"){
   $response = "";
   include_once "../includes/db.php";
   $db = db::get();
   $insertQueryString = "INSERT INTO `bin`(`bin_shelf`, `bin_number`) VALUES (".$db->escape($_POST["binShelf"]).", '".$db->escape($_POST["binName"])."')";
   $db->query($insertQueryString);

   $binQueryString = "SELECT * FROM `bin` WHERE `bin_shelf` = ".$_POST["binShelf"]." AND `bin_number` = '".$_POST["binName"]."'";
   $bin = $db->getRow($binQueryString);

      $response .= "<option selected value=".$bin["bin_id"].">".$bin["bin_number"]."</option>";

   echo $response;
}


///////////////////////////////////////////////setelések/////////////////////////////////////////////////////////////////////
if(isset($_POST['stockId'])){
   include_once "../includes/db.php";
   $response = "";
   $db = db::get();
   $queryString = "SELECT * FROM `aisle` WHERE `aisle_stock_place` =".$_POST['stockId'];
   $aisle = $db->getArray($queryString);
   echo '<option value="">Válassz!</option>';
   foreach($aisle as $listItem){
      $response .= '<option value="'.$listItem["aisle_id"].'">'.$listItem["aisle_number"].'</option>';
   }
   echo $response;
}

if(isset($_POST['aisleId']) && isset($_POST["action"]) && $_POST["action"] == "setRack"){
   include_once "../includes/db.php";
   $response = "";
   $db = db::get();
   $queryString = "SELECT * FROM `racks` WHERE `rack_aisle` =".$_POST["aisleId"];
   $racks = $db->getArray($queryString);
     if($racks != null){
        echo '<option value="">Válassz!</option>';
            foreach($racks as $listItem){
               $response .= '<option value="'.$listItem['rack_id'].'">'.$listItem['rack_number'].'</option>';
            }
         echo $response;
      }else{
         echo "<option>Nincs felvéve!</option>";
      }
}

if(isset($_POST["rackId"]) && isset($_POST["action"]) && $_POST["action"] == "setShelf"){
   include_once "../includes/db.php";
   $response = "";
   $db = db::get();
   $queryString = "SELECT * FROM `shelf` WHERE `shelf_rack` =".$_POST["rackId"];
   $shelf = $db->getArray($queryString);
     if($shelf != null){
        echo '<option value="">Válassz!</option>';
            foreach($shelf as $listItem){
               $response .= '<option value="'.$listItem['shelf_id'].'">'.$listItem['shelf_number'].'</option>';
            }
         echo $response;
      }else{
         echo "<option>Nincs felvéve!</option>";
      }
}

if(isset($_POST["shelfId"]) && isset($_POST["action"]) && $_POST["action"] == "setBin"){
   include_once "../includes/db.php";
   $response = "";
   $db = db::get();
   $queryString = "SELECT * FROM `bin` WHERE `bin_shelf` =".$_POST["shelfId"];
   $bin = $db->getArray($queryString);
     if($bin != null){
        echo '<option value="">Válassz!</option>';
            foreach($bin as $listItem){
               $response .= '<option value="'.$listItem['bin_id'].'">'.$listItem['bin_number'].'</option>';
            }
         echo $response;
      }else{
         echo "<option>Nincs felvéve!</option>";
      }
}

/////////////////////////////////////////////all data//////////////////////////////////////////////////////////

if(isset($_POST['productNumber']) && isset($_POST['stockName']) && isset($_POST['aisle']) && isset($_POST['rack']) && isset($_POST['shelf']) && isset($_POST['bin']) && isset($_POST['count']) && isset($_POST["action"]) && $_POST["action"] == "insertToSession"){

   if(!isset($_SESSION["count"])){
      $_SESSION["count"] = $_POST["count"];
   }

   include_once "../includes/db.php";
   $db = db::get();
   $queryString = "SELECT `product_name`, `product_price` FROM `products` WHERE `product_item_number` = ".$_POST["productNumber"];
   $productArray = $db->getRow($queryString);
   $productNumber = $_POST["productNumber"];
   $productQuantity = $_POST["productQuantity"];
   $stockName = $_POST["stockName"];
   $aisle = $_POST["aisle"];
   $rack = $_POST["rack"];
   $shelf = $_POST["shelf"];
   $bin = $_POST["bin"];
   $count = $_SESSION["count"];
   
   $_SESSION["productName"][$count] = $productArray["product_name"];
   $_SESSION["productPrice"][$count] = $productArray["product_price"];
   $_SESSION["productNumber"][$count] = $productNumber;
   $_SESSION["productQuantity"][$count] = $productQuantity;
   $_SESSION["stockName"][$count] = $stockName;
   $_SESSION["aisle"][$count] = $aisle;
   $_SESSION["rack"][$count] = $rack;
   $_SESSION["shelf"][$count] = $shelf;
   $_SESSION["bin"][$count] = $bin;

   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   $placeQuery =  
   "SELECT stock_places.stock_name, aisle.aisle_number, racks.rack_number, shelf.shelf_number, bin.bin_number 
   FROM stock_places, aisle, racks, shelf, bin 
   WHERE stock_places.stock_id= ".$_SESSION["stockName"][$count]."
   AND aisle.aisle_id = ".$_SESSION["aisle"][$count]."
   AND racks.rack_id= ".$_SESSION["rack"][$count]."
   AND shelf.shelf_id= ".$_SESSION["shelf"][$count]."
   AND bin.bin_id = ".$_SESSION["bin"][$count];
   $row = $db->getRow($placeQuery);
   $_SESSION["place"][$count] = $row["stock_name"].' | '.$row["aisle_number"].' | '.$row["rack_number"].' | '.$row["shelf_number"].' | '.$row["bin_number"];
   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   $_SESSION["count"] = $_SESSION["count"] + 1;
   //echo var_dump($_SESSION["productNumber"]);
   //echo var_dump($_SESSION["count"]);
}

if(isset($_POST["productNumber"]) && isset($_POST["action"]) && $_POST["action"] == "checkProductNumber"){
   if($_POST["productNumber"] != ""){
      include_once "../includes/db.php";
      $db = db::get();
      $selectQueryString = "SELECT `product_name` FROM `products` WHERE `product_item_number` ='".$_POST["productNumber"]."'";
      $result = $db->getRow($selectQueryString);
      if($result != ""){
         echo $result["product_name"];
      }else{
         //echo 'Nincs ilyen termék! <a href="newProduct.php?productNumber='.$_POST["productNumber"].'" class="btn btn-primary btn-sm">Felvitel</a>';
         echo "'<script>warningModal()</script>'";
      }
   }else{
      //echo "Kérem kitölteni!";
      echo '<script>errorModal()</script>';
   }
   
}
<?php
    include_once "includes/header.php";
    include_once "includes/navbar.php";
    include_once "includes/db.php";
    $db = db::get();
    //var_dump($_SESSION['basketProductId']);
    //var_dump($_SESSION["basketCount"]);
    //var_dump($_SESSION["basketAllProductQuantity"]);
?>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="basketLogic/basketLogic.js"></script>
<script src="basketLogic/basketModalChecker.js"></script>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Kosár tartalma</h4>
        </div>
        <div class="card-body">
            <?php if(isset($_SESSION["basketProduct"]) && !empty($_SESSION["basketProduct"])) : ?>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Termék megnevezése</th>
                        <th scope="col">Mennyisége</th>
                        <th scope="col">Ára</th>
                        <th scope="col">Áfa(%)</th>
                        <th scope="col">Összesen</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php for($i = 1;$i <= $_SESSION["basketAllProductQuantity"]; $i++) : ?>
                        <?php if(!empty($_SESSION["basketProduct"][$i])) : ?>
                            <tr>
                                <?php //include_once "basketLogic/productDetail.php";

                                    $db = db::get();
                                    $productDetailString = "SELECT product_price, product_vat FROM products WHERE id=(SELECT product_id FROM where_is_the_product WHERE id=".$_SESSION["basketProductId"][$i].")";
                                    $result = $db->getRow($productDetailString);

                                    $productStockDetailString = "SELECt stock_places.stock_name, aisle.aisle_number, racks.rack_number, shelf.shelf_number, bin.bin_number FROM where_is_the_product, stock_places, aisle, racks, shelf, bin WHERE bin.bin_shelf=shelf.shelf_id AND shelf.shelf_rack=racks.rack_id AND racks.rack_aisle=aisle.aisle_id AND aisle.aisle_stock_place=stock_places.stock_id AND where_is_the_product.bin_id=bin.bin_id AND where_is_the_product.id = ".$_SESSION["basketProductId"][$i];
                                    $stockResult = $db->getRow($productStockDetailString);

                                ?>
                                <th><?php echo $_SESSION["basketProduct"][$i] ?></th>
                                <td><?php echo $_SESSION["basketQuantity"][$i] ?></td>
                                <td><?php echo $result["product_price"]." Ft" ?></td>
                                <td><?php echo $result["product_vat"] ?></td>
                                <td><?php echo $result["product_price"] * $_SESSION["basketQuantity"][$i]." Ft" ?></td>
                                <td><button class="btn btn-danger float-right" onclick="deleteBasketItem(<?php echo $i ?>)"><i class="material-icons">delete</i></button></td>
                            </tr>
                            <tr>
                                <td colspan="6"><?php echo "<b>Hely:</b> ".$stockResult['stock_name']." | ".$stockResult['aisle_number']." | ".$stockResult['rack_number']." | ".$stockResult['shelf_number']." | ".$stockResult['bin_number'] ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endfor; ?>
                    </tbody>
                    </table>
                <hr>
                <!--<a href="basketLogic/commitBasket.php" class="btn btn-info">Véglegesítés</a>-->
                <button data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-info">Szállítás véglegesítése</button>
            <?php else : ?>
                    <div class="alert alert-warning">
                        A kosár üres!
                    </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="basket_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal_body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer" id="modal_footer">
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Szállítási/Számlázási adatok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="kekekek">
                <?php include_once "basketLogic/deliveryAddressForm.php" ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Mégse</button>
                <button type="button" class="btn btn-primary" id="saveDeliveryButton">Rögzítés</button>
            </div>
        </div>
    </div>
</div>

<?php include_once "includes/footer.php" ?>
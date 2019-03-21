<?php
    include_once "includes/header.php";
    include_once "includes/navbar.php";

    if(isset($_GET["product"]) && $_GET["product"] != ""){
        include_once "includes/db.php";
        $db = db::get();
        $queryString = "SELECT * FROM products WHERE id=".$_GET["product"];
        $product = $db->getRow($queryString);

        $stockQueryString = "SELECT stock_places.stock_name, bin.bin_number, where_is_the_product.quantity, where_is_the_product.id FROM stock_places, bin, where_is_the_product WHERE stock_places.stock_id = where_is_the_product.stock_id AND bin.bin_id = where_is_the_product.bin_id AND `where_is_the_product`.`product_id` =".$_GET["product"];
        $stockPlaces = $db->getArray($stockQueryString);
    }
?>

<script src="productLogic/basket.js"></script>

<style>
    img.productImage{
        width: 30%;
        height: 30%;
        border-width: 5px;
    }
    div.detailList{
        width: 50%;
    }
</style>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Termék részletei</h4>
            </div>
            <div class="card-body">
                <img class="img-thumbnail productImage float-right" src="<?php echo $product["product_image_url"] ?>" alt="<?php echo $product["product_name"] ?>">
                <div class="detailList">
                    <table class="table">
                        <tbody>
                            <tr>
                            <th>Megnevezés:</th>
                            <td><?php echo $product["product_name"] ?></td>
                            </tr>
                            <tr>
                            <th>Cikkszám:</th>
                            <td><?php echo $product["product_item_number"] ?></td>
                            </tr>
                            <tr>
                            <th>Kategória:</th>
                            <td><?php echo $product["product_category"] ?></td>
                            </tr>
                            <th>Gyártó:</th>
                            <td><?php echo $product["product_manufacturer"] ?></td>
                            </tr>
                            <th>Ár:</th>
                            <td><?php echo $product["product_price"]." Ft" ?></td>
                            </tr>
                            <th>Áfa:</th>
                            <td><?php echo $product["product_vat"] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                    <?php if(isset($stockPlaces) && count($stockPlaces) > 0) : ?>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Raktár</th>
                                <th scope="col">Doboz</th>
                                <th scope="col">Mennyiség</th>
                                <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($stockPlaces as $place) : ?>
                                    <tr>
                                        <td><?php echo $place["stock_name"] ?></td>
                                        <td><?php echo $place["bin_number"] ?></td>
                                        <td><?php echo $place["quantity"] ?></td>
                                        <td><button class="btn btn-info" onclick="basketModal(<?php echo $place['id'].','.$place['quantity'] ?>)"><i class="material-icons">shopping_basket</i></button></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                        </table>
                    <?php else : ?>
                        <div class="alert alert-warning">
                            Nincs raktáron a termék!
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>

<?php include_once "includes/footer.php" ?>
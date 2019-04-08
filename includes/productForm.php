<?php include_once "includes/productFormValidate.php" ?>
<!-- jquery script jqueryvel -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/productFormValidate.js"></script>
<!-- jquery script vége -->

<style>
#message {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   text-align: center;
   margin-bottom: 0;
}
</style>


    
        <form method="POST" enctype="multipart/form-data">
        <!---------- Form kezdete ---------->
        <!---------------------------- alertek -------------------------------------->
        <?php if(isset($_GET["msg"]) && $_GET["msg"] == "success") :?>
            <div class="alert alert-success" style="display: none;" role="alert" style="" id="message">
                Sikeres feltöltés!
            </div>
        <?php endif; ?>
        <?php if(isset($_GET["error"]) && $_GET["error"] != "") :?>
            <div class="alert alert-danger" style="display: none;" role="alert" style="" id="message">
                <?php 
                    echo ($_GET["error"] == "empty" ? "Minden mező kitöltése kötelező!" : "" );
                    echo ($_GET["error"] == "db" ? "Ismeretlen hiba, kérem forduljon rendszergazdához!" : "" );
                    echo ($_GET["error"] == "image" ? "A választott kép nem megfelelő" : "" );
                ?>
            </div>
        <?php endif; ?>
        <!----------------------------alert vége ------------------------------------->
            <div class="form-group">
                <label for="productName">Termék megnevezése</label>
                <input type="text" class="form-control" id="productName" name="product_name" placeholder="Termék neve">
                <div class="valid-feedback">
                    Jónak tűnik!
                </div>
            </div>

                <div class="form-row">
                    <div class="form-group col">
                    <label for="productBarcode">Vonalkód</label>
                    <input type="number" class="form-control" id="productBarcode" name="product_barcode" placeholder="0 123456 789012">
                    <div class="valid-feedback">
                        Jónak tűnik
                    </div>
                    </div>
                    <div class="form-group col">
                    <label for="productItemNumber">Cikkszám</label>
                    <input type="text" class="form-control" id="productItemNumber" name="product_item_number" placeholder="cikkszám"
                        value="<?php echo (isset($_GET["productNumber"]) ? $_GET["productNumber"] : "") ?>"
                    >
                    <div class="valid-feedback">
                        Jónak tűnik!
                    </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                    <label for="productPrice">Termék ára</label>
                    <input type="number" class="form-control" id="productPrice" name="product_price" placeholder="ár">
                    <div class="valid-feedback">
                        Jónak tűnik!
                    </div>
                    </div>
                    <!--------------------------------------- Áfa input ------------------------------------------------>
                    <div class="form-group col">
                    <label for="productVat">Áfa</label>
                    <div class="input-group">
                    <input type="number" class="form-control" placeholder="Áfa értéke %" id="productVat" name="product_vat">
                        <div class="input-group-append">
                            <span class="input-group-text">%</span>
                        </div>
                        <div class="valid-feedback">
                            Jónak tűnik!
                        </div>
                    </div>
                    </div>
                    <!--------------------------------------- Áfa input ------------------------------------------------>
                </div>

            <div class="form-row">
            <div class="form-group col">
                <label for="productCategory">Kategória</label>
                <select class="form-control" name="product_category" id="productCategory">
                    <?php if(isset($category) && count($category) > 0):?>
                        <option value="">Válassz kategóriát!</option>
                        <?php foreach($category as $listItem): ?>
                            <option value="<?php echo $listItem["category_id"] ?>"><?php echo $listItem["category_name"] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
                <small class="form-text text-muted">Kategória hozzáadásához kattints 
                  <a id="modalCategory" href="" data-toggle="modal" data-target="#insertModal">
                    ide
                  </a>!
                </small>
                <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
            </div>
            <div class="form-group col">
                <label for="productUnit">Mértékegység</label>
                <select class="form-control" name="product_unit" id="productUnit">
                    <?php if(isset($unit) && count($unit) > 0):?>
                        <option value="">Válassz mértékegységet!</option>
                        <?php foreach($unit as $listItem): ?>
                            <option value="<?php echo $listItem["unit_id"] ?>"><?php echo $listItem["unit_name"] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <small class="form-text text-muted">Mértékegység hozzáadásához kattints 
                    <a id="modalUnit" href="" data-toggle="modal" data-target="#insertModal">
                        ide
                    </a>!
                </small>
            </div>
            </div>

            <div class="form-group">
                <label for="productManufacturer">Gyártó</label>
                <select multiple class="form-control" name="product_manufacturer" id="productManufacturer">
                <?php if(isset($manufacturer) && count($manufacturer) > 0):?>
                    <?php foreach($manufacturer as $listItem): ?>
                        <option value="<?php echo $listItem["manufacturer_id"] ?>"><?php echo $listItem["manufacturer_name"] ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
                </select>
                <small class="form-text text-muted">Gyártó hozzáadásához kattints 
                    <a id="modalManufacturer" href="" data-toggle="modal" data-target="#insertModal">
                        ide
                    </a>!
                </small>
            </div>
            <div class="form-group">
                <label for="productDescription">Leírás</label>
                <textarea class="form-control" name="product_description" id="productDescription" rows="3"></textarea>
                <div class="valid-feedback">
                    Jónak tűnik!
                </div>
            </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="productImage" id="productImage">
                        <label class="custom-file-label" for="productImage">Válassz képet!</label>
                    </div>
                    <hr>
                <?php if(isset($kek)) : ?>
                    <button class="btn btn-info" name="saveButton" type="submit">Mentés</button>
                    <a href="products.php" class="btn btn-warning">Mégse</a>
                <?php endif; ?>
        </form>






<!--------------------------- Modal ----------------------------------->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalHeader">Elem beillesztése</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
                <div class="modal-body">
                    <form id="my-form" method="POST" action="">
                        <div class="form-group" id="modalInputFiled">
                                <!--<div id="manufacturerInputs" style="display: none">
                                    <label for="modalInput" id="modalBody">Gyártó címe:</label>
                                    <input type="text" class="form-control" id="modalInput" name="modalInput">

                                    <label for="modalInput" id="modalBody">Gyártó Email címe</label>
                                    <input type="text" class="form-control" id="modalInput" name="modalInput">
                                </div>-->
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Mégse</button>
                    <button type="button" class="btn btn-info" id="kek" onclick="validateModal()">Hozzáadás</button>
                </form>
                </div>
    </div>
  </div>
</div>
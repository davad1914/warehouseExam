<?php 
    include_once "includes/header.php";
    include_once "includes/navbar.php";
    include_once "includes/db.php";
    $db = db::get();
    $listStockQueryString = "SELECT `stock_id`, `stock_name` FROM `stock_places`";
    $stockPlaces = $db->getArray($listStockQueryString);

    echo var_dump($_SESSION["productNumber"]);
?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="stockLogic/extraForms.js"></script>
    <script src="stockLogic/addProductToStock.js"></script>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="float-right" id="responseText"></div>
                Termékek felvitele raktárba
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md">
                        <label for="productNumber">Cikkszám</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cikkszám" aria-label="productNumber" aria-describedby="productNumber" name="productNumber" id="productNumber"
                            value="<?php 
                                    if(isset($_GET["product"]) && $_GET["product"] != ""){
                                        $count = $_GET["product"];
                                        $text = $_SESSION["productNumber"][$count];
                                        echo $text;
                                    }
                                ?>"
                            >
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="stockPlaceNumber" onclick="modal()">Kész</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md">
                        <label for="stockName">Raktár</label>
                        <select class="form-control" id="stockName" onchange="setAisle()">
                            <?php if(isset($stockPlaces) && count($stockPlaces) > 0) : ?>
                                <option>Válassz raktárhelyet!</option>
                                <?php foreach($stockPlaces as $listItem) : ?>
                                    <option value="<?php echo $listItem["stock_id"] ?>"><?php echo $listItem["stock_name"] ?></option>
                                <?php endforeach; ?>
                            <?php else : ?>
                            <option>Nincs raktár felvéve!</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                
                    <div class="form-row ">
                                <div class="form-group col-6 col-lg-3">
                                    <label for="aisle">Utca</label>
                                    <select name="aisle" id="aisle" class="form-control" onchange="setRack()">
                                        <option value="">Válassz raktárt!</option>
                                    </select>
                                    <small id="smallAisle"></small>
                                </div>
                                <div class="form-group col-6 col-lg-3">
                                    <label for="rack">Álvány</label>
                                    <select name="rack" id="rack" class="form-control" onchange="setShelf()">
                                        <option>Válassz utcát!</option>
                                    </select>
                                    <small id="smallRack"></small>
                                </div>
                                <div class="form-group col-6 col-lg-3">
                                    <label for="shelf">Polc</label>
                                    <select name="shelf" id="shelf" class="form-control" onchange="setBin()">
                                        <option value="">Válassz polcot!</option>
                                    </select>
                                    <small id="smallShelf"></small>
                                </div>
                                <div class="form-group col-6 col-lg-3">
                                    <label for="bin">Doboz</label>
                                    <select name="bin" id="bin" class="form-control">
                                        <option value="">Válassz dobozt!</option>
                                    </select>
                                    <small id="smallBin"></small>
                                </div>
                    </div>
                    
                    <label for="productQuantity">Darabszám</label>
                    <input type="number" min="1" class="form-control" name="productQuantity" id="productQuantity" placeholder="Adj meg egy darabszámot">
                    <br>

                <!--<button class="btn btn-info"><i class="material-icons" onclick="allData()">save</i></button>-->
                <div class="float-right <?php echo (!isset($_SESSION["productNumber"]) ? "d-none" : "") ?>" id="inputEnd">
                    <a href="productSummary.php" class="btn btn-info float-right" id="stopFormSession">
                        <i class="material-icons">done</i>
                    </a>
                </div>
                <button class="btn btn-info" onclick="allData()"><i class="material-icons">add</i></button>
                <a href="logged.php" class="btn btn-warning"><i class="material-icons">cancel</i></a>
            </div>
        </div>  
    </div>

    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Hiba</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                Kérem forduljon rendszergazdájához!
            </div>
            <div class="modal-footer" id=modalFooter>
                
            </div>
            </div>
        </div>
    </div>

    <div id="func"></div>

<?php include_once "includes/footer.php" ?>
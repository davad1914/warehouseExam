<?php 
    if(isset($_GET["stock"]) && $_GET["stock"] != ""){
        include_once "includes/db.php";
        $db = db::get();
        $selectQueryString = "SELECT `stock_name`, `stock_address` FROM `stock_places` WHERE `stock_id` = ".$_GET["stock"];
        $stock = $db->getRow($selectQueryString);
    }
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            Raktár felvitele
        </div>
        <div class="card-body">
            <form action="<?php echo (isset($_GET["stock"]) ? "stockLogic/updateStock.php" : "stockLogic/insertStock.php") ?>">
                <div class="form-group">
                    <label for="stockName">Raktár elnevezése</label>
                    <input type="text" class="form-control" id="stockName" name="stockName"
                        value="<?php echo (isset($_GET["stock"]) ? $stock["stock_name"] : "") ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="stockPlace">Raktár címe</label>
                    <input type="text" class="form-control" id="stockPlace" name="stockPlace"
                        value="<?php echo (isset($_GET["stock"]) ? $stock["stock_address"] : "") ?>"
                    >
                </div>
                <button type="submit" name="insertStockButton" class="btn btn-primary" 
                    value="<?php echo (isset($_GET["stock"]) ? $_GET["stock"] : "") ?>"
                >Mentés</button>
                <a href="stockList.php" class="btn btn-warning">Mégse</a>
            </form>
        </div>
    </div>
</div>
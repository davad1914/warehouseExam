<?php
    include_once "includes/header.php";
    include_once "includes/navbar.php";
?>
<style>
    select{
        overflow-x:auto;
        overflow-y:auto;
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-header">
            Kiszállítás kezelése
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="productNumber">Cikkszám</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cikkszám" aria-label="productNumber" aria-describedby="productNumber" name="productNumber" id="productNumber">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="stockPlaceNumber" onclick="check()">Kész</button>
                    </div>
                </div>
            </div>
            <label for="productManufacturer">Mely helyről?</label>
            <select multiple class="form-control" name="product_manufacturer" id="productManufacturer">
                    <option>Adj meg egy cikkszámot!</option>
            </select>
        </div>
    </div>
</div>

<?php include_once "includes/footer.php" ?>
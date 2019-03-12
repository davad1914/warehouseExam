<?php 
    include_once "includes/header.php";
    include_once "includes/navbar.php";
    include_once "includes/db.php";
    $db = db::get();
    $listStockQueryString = "SELECT `stock_id`, `stock_name` FROM `stock_places`";
    $stockPlaces = $db->getArray($listStockQueryString);
?>

<script src="js/jquery-3.3.1.min.js"></script>
<script>
    var count = 1;
    /*
    function showHint(str) {
    var xhttp;
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "includes/productNumberChecker.php?q="+str, true);
    xhttp.send();   
    }
    */

    function addForms(){
        var form = '<hr><div class="form-row"> <div class="form-group col-md"> <label for="productNumber">Cikkszám</label> <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="Cikkszám" aria-label="productNumber" aria-describedby="productNumber" name="productNumber" id="productNumber"> <div class="input-group-append"> <button class="btn btn-outline-secondary" type="button" id="button-addon2">Kész</button> </div> </div> </div> <div class="form-group col-md"> <label for="stockName">Raktár</label> <select class="form-control" id="stockName"> <?php if(isset($stockPlaces) && count($stockPlaces) > 0) : ?> <option>Válassz!</option> <?php foreach($stockPlaces as $listItem) : ?> <option value="<?php echo $listItem["stock_id"] ?>"><?php echo $listItem["stock_name"] ?></option> <?php endforeach; ?> <?php else : ?> <option>Nincs raktár felvéve!</option> <?php endif; ?> </select> </div> </div> <div class="form-row "> <div class="form-group col-6 col-lg-3"> <label for="aisle">Utca</label> <select name="aisle" id="aisle" class="form-control"> <option value="">Válassz!</option> </select> </div> <div class="form-group col-6 col-lg-3"> <label for="rack">Álvány</label> <select name="rack" id="rack" class="form-control"> <option value="">Válassz!</option> </select> </div> <div class="form-group col-6 col-lg-3"> <label for="shelf">Polc</label> <select name="shelf" id="shelf" class="form-control"> <option value="">Válassz!</option> </select> </div> <div class="form-group col-6 col-lg-3"> <label for="bin">Doboz</label> <select name="bin" id="bin" class="form-control"> <option value="">Válassz!</option> </select> </div> </div>'
        $('#extraForms').append(form);
        count++;
        console.log(count);
    }
</script>

    <div class="container">
        <!-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav> -->

        <div class="card">
            <div class="card-header">
                Termékek felvitele raktárba
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md">
                        <label for="productNumber">Cikkszám</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cikkszám" aria-label="productNumber" aria-describedby="productNumber" name="productNumber" id="productNumber">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Kész</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md">
                        <label for="stockName">Raktár</label>
                        <select class="form-control" id="stockName">
                            <?php if(isset($stockPlaces) && count($stockPlaces) > 0) : ?>
                                <option>Válassz!</option>
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
                                    <select name="aisle" id="aisle" class="form-control">
                                        <option value="">Válassz!</option>
                                    </select>
                                </div>
                                <div class="form-group col-6 col-lg-3">
                                    <label for="rack">Álvány</label>
                                    <select name="rack" id="rack" class="form-control">
                                        <option value="">Válassz!</option>
                                    </select>
                                </div>
                                <div class="form-group col-6 col-lg-3">
                                    <label for="shelf">Polc</label>
                                    <select name="shelf" id="shelf" class="form-control">
                                        <option value="">Válassz!</option>
                                    </select>
                                </div>
                                <div class="form-group col-6 col-lg-3">
                                    <label for="bin">Doboz</label>
                                    <select name="bin" id="bin" class="form-control">
                                        <option value="">Válassz!</option>
                                    </select>
                                </div>
                    </div>

                    <div id="extraForms">
                    
                    </div>

                <button class="btn btn-info float-right"><i class="material-icons" onclick="addForms()">add</i></button>
            </div>
        </div>  
    </div>

<?php include_once "includes/footer.php" ?>
<?php
    include_once "includes/header.php";
    include_once "includes/navbar.php";
    require_once "includes/db.php";

    (isset($_GET["page"]) ? "" : $_GET["page"] = 1);
    ($_GET["page"] == "" ? $_GET["page"] = 1 : "");

    $db = db::get();  //a db classon belül a get function-t hívjuk meg, ami példányosítja a db class-t

    if(isset($_POST["deleteItem"]))
    {
        $deleteQueryString = "DELETE FROM `products` WHERE `id`=".$_POST["deleteItem"];
        $db->query($deleteQueryString);   //a query a db file-ban van, ezt mi írjuk meg! Itt az sql parancsot lefuttatja, jelen esetben a deleteQueryString-et
    }

    //A querystring-et berakjuk egy getArray-be, ami tömbket hoz létre. Ezen foreach-el megyünk végig.
    $querystring = "SELECT * FROM `products` LIMIT 16 OFFSET ".($_GET["page"] - 1) * 16;
    $list = $db->getArray($querystring);

    ////////////////////////paginator
    $tableRowNumbers = "SELECT count(*) AS db FROM products";
    $rowQuantity = $db->getRow($tableRowNumbers);
    $pageQuantity = (int)($rowQuantity["db"] / 16);
    $currentPage = basename(__FILE__);
    //var_dump($currentPage);
    //var_dump($rowQuantity);
    ($rowQuantity["db"] % 16 > 0 ? $pageQuantity++ : "");
    //var_dump($rowQuantity["db"]);
    //var_dump($pageQuantity);
?>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="productLogic/productList.js"></script>

<style>
    div.card{
        height: auto;
    }
    div.card-bottom{
        margin-bottom: 10px;
    }

    img.product-image{
        height: auto;
        max-height: 100%;

        width: auto;
        max-width: 100%;
    }
    div.product-image-container{
        /*border-style: solid;
        border-width: 1px;*/
        height: 200px;
        text-align: center;
        border-bottom: 1px solid grey;
    }
    div.product-description{
        min-height: 200px;
    }
</style>
<div class="container">
    <div class="sticky-top" style="z-index: 1">
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <label for="searchInput">Keresés</label>
            <input type="text" class="form-control" id="searchInput" name="searchInput">
            <hr>
            <button class="btn btn-info" data-toggle="collapse" data-target="#collapseExample" onclick="addFilters()">Keresés</button>
        </div>
    </div>
        <button class="btn btn-default button-sm" type="button" data-toggle="collapse" data-target="#collapseExample" style="margin-bottom: 10px; width: 100%; border-color: grey; border-bottom-left-radius: 100px; border-bottom-right-radius: 100px ; background-color: white;"><i class="material-icons">filter_list</i></button>
    </div>
<?php if(isset($list) && count($list) > 0):?>
    <div class="row productListView">

    <?php foreach($list as $listItem): ?>
         <div class="col-sm-6 col-lg-3 card-bottom">
            <div class="card" style="width: 100%; height: 100%;">
                    <div class="product-image-container">
                        <img src="<?php echo $listItem["product_image_url"] ?>" class="card-img-top img-fluid product-image" alt="">
                    </div>
                <div class="card-body product-description">
                    <h6 class="card-title"><?php echo $listItem["product_name"] ?></h6>
                    <p><?php echo $listItem["product_description"] ?></p>
                    <p><b><?php echo $listItem["product_price"]; echo "Ft" ?></b></p>
                    <div><small> <?php echo "Áfa: "; echo $listItem["product_vat"]; ?> </small></div>
                        <a href="viewProduct.php?product=<?php echo $listItem["id"] ?>" class="btn btn-primary">Részlet</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    </div>
<?php else: ?>
    <div class="alert alert-warning text-center">
                        Jelenleg nincs megleneíthető elem!
    </div>
<?php endif; ?>
    </div>
<div id="paginator">
    <?php include_once "includes/paginator.php" ?>
</div>

<?php include_once "includes/footer.php" ?>
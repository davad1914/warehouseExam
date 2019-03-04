<?php
    include_once "includes/header.php";
    include_once "includes/navbar.php";
    require_once "includes/db.php";

    $db = db::get();  //a db classon belül a get function-t hívjuk meg, ami példányosítja a db class-t

    if(isset($_POST["deleteItem"]))
    {
        $deleteQueryString = "DELETE FROM `products` WHERE `id`=".$_POST["deleteItem"];
        $db->query($deleteQueryString);   //a query a db file-ban van, ezt mi írjuk meg! Itt az sql parancsot lefuttatja, jelen esetben a deleteQueryString-et
    }

    //A querystring-et berakjuk egy getArray-be, ami tömbket hoz létre. Ezen foreach-el megyünk végig.
    $querystring = "SELECT * FROM `products`";
    $list = $db->getArray($querystring);


?>

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
<?php if(isset($list) && count($list) > 0):?>
    <div class="row">
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
                        <a href="#viewProduct.php" class="btn btn-primary">Megnéz</a>
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

<?php include_once "includes/footer.php" ?>
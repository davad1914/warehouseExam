<?php
    include_once "includes/header.php";
    include_once "includes/navbar.php";
    //var_dump($_SESSION["count"]);
?>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Termékek összesítése</h4>
            </div>
            <div class="cad-body">
            <table class="table">
            <?php if(isset($_SESSION["productNumber"])) : ?>
                <thead>
                    <tr>
                    <th scope="col">Termék megnevezése</th>
                    <th scope="col">Cikkszám</th>
                    <th scope="col">Darabszám</th>
                    <th scope="col">Hely</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php for($i = 1; $i < $_SESSION["count"]; $i++) : ?>
                    <tr>
                    <th><?php echo $_SESSION["productName"][$i] ?></th>
                    <td><?php echo $_SESSION["productNumber"][$i] ?></td>
                    <td><?php echo $_SESSION["productQuantity"][$i] ?></td>
                    <td><?php echo $_SESSION["place"][$i] ?></td>
                    <td><a href="addProductToStock.php?product=<?php echo $i ?>" class="btn btn-warning float-right"><i class="material-icons">create</i></a></td>
                    </tr>
                <?php endfor; ?>
                </tbody>
            </table>
            <div class="container" style="margin-bottom: 10px;">
            <a href="stockLogic/insertProductsToStock.php" class="btn btn-info float-right">Véglegesítés</a>
            <a href="addProductToStock.php" class="btn btn-warning">Vissza</a>
            <a class="btn btn-danger" href="stockLogic/unsetSession.php">Összes törlése</a>
            </div>
            <?php else : ?>
                <div class="alert alert-warning" role="alert">
                    Nincs felvéve termék!
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>

<?php include_once "includes/footer.php" ?>
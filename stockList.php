<?php 
    include_once "includes/header.php";
    include_once "includes/navbar.php";
    require_once "includes/db.php";

    $db = db::get();

    $selectString = "SELECT * FROM `stock_places`";
    $list = $db->getArray($selectString);
?>

<style>
    .quadrat {
        background-color: #ccffcc;
        -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
        -webkit-animation-duration: 4s; /* Safari 4.0 - 8.0 */
        animation-name: example;
        animation-duration: 4s;
        }

        /* Safari 4.0 - 8.0 */
        @-webkit-keyframes example {
        0%   {background-color: #33ff33;}
        25%  {background-color: #66ff66;}
        50%  {background-color: #99ff99;}
        100% {background-color: #ccffcc;}
        }

        /* Standard syntax */
        @keyframes example {
        0%   {background-color: #33ff33;}
        25%  {background-color: #66ff66;}
        50%  {background-color: #99ff99;}
        100% {background-color: #ccffcc;}
    }
</style>

<br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="createStockPlace.php" class="btn btn-primary float-right">+ Raktár felvétele</a>
                <h5>Raktárak:</h5>
            </div>
            <div class="card-body">
                <?php if(isset($list) && count($list) > 0) : ?>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Neve</th>
                            <th scope="col">Címe</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($list as $listItem) : ?>
                                <tr <?php echo (isset($_GET["success"]) && $listItem["stock_id"] == $_GET["success"] ) ? 'class="quadrat"'/*'style="background-color: #b3ffb3;"'*/ : "" ?> >
                                <td><?php echo $listItem["stock_name"]; ?></td>
                                <td><?php echo $listItem["stock_address"]; ?></td>
                                <td width="10%"><a href="updateStockPlace.php?stock=<?php echo $listItem["stock_id"] ?>" class="btn btn-primary"><i class="material-icons md-dark">create</i></a></div></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div class="alert alert-warning" role="alert">
                        Jelenleg nincs raktár felvéve!
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php include_once "includes/footer.php" ?>
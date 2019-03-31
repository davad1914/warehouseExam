<?php 
    (isset($_GET["page"]) ? "" : $_GET["page"] = 1);
    ($_GET["page"] == "" ? $_GET["page"] = 1 : "");
    include_once "includes/header.php";
    include_once "includes/navbar.php";
    include_once "includes/db.php";
    $db = db::get();
    $listQueryString = "SELECT receive.receive_id, receive.receive_date, receive.receive_pdf, users.username FROM `receive`, `users` WHERE users.user_id = receive.receive_user ORDER BY receive.receive_date DESC LIMIT 10 OFFSET ".($_GET["page"] - 1) * 10;
    $result = $db->getArray($listQueryString);
    $tableRowNumbers = "SELECT count(*) AS db FROM receive";
    $rowQuantity = $db->getRow($tableRowNumbers);
    $pageQuantity = (int)($rowQuantity["db"] / 10);
    $currentPage = basename(__FILE__);
    //var_dump($currentPage);
    //var_dump($rowQuantity);
    ($rowQuantity["db"] % 10 > 0 ? $pageQuantity++ : "");
    //var_dump($rowQuantity["db"]);
    //var_dump($pageQuantity);
?>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="includes/supplyList.js"></script>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Beszerzési megbízások</h4>
            </div>
            <div class="card-body" style="padding-bottom: 0px;">
                <?php if($result != null) : ?>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Felhasználó</th>
                            <th scope="col">Dátum</th>
                            <th scope="col" class="text-center">Termékek</th>
                            <th scope="col"><div class="float-right">Számla</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($result as $listItem) : ?>
                                <tr>
                                <th scope="row"><?php echo $listItem["receive_id"] ?></th>
                                <td><?php echo $listItem["username"] ?></td>
                                <td><?php echo $listItem["receive_date"] ?></td>
                                <td class="text-center"><button onclick="showProducts(<?php echo $listItem['receive_id'] ?>)" class="btn btn-info"><i class="material-icons">description</i></button></td>
                                <td><a href="<?php echo 'invoice/receive/'.$listItem["receive_pdf"] ?>" class="btn btn-info float-right"><i class="material-icons">picture_as_pdf</i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        
                        
                        
                    </table>
                <?php endif; ?>



            </div>
        </div>
    </div>

    <?php include_once "includes/paginator.php" ?>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="showProductsModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal_body">
                
            </div>
            </div>
        </div>
    </div>


<?php include_once "includes/footer.php" ?>
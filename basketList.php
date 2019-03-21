<?php
    include_once "includes/header.php";
    include_once "includes/navbar.php";
?>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="basketLogic/basketLogic.js"></script>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Kosár tartalma</h4>
        </div>
        <div class="card-body">
            <?php if(isset($_SESSION["basketProduct"]) && !empty($_SESSION["basketProduct"])) : ?>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Termék megnevezése</th>
                        <th scope="col">Mennyisége</th>
                        <th scope="col">Ára</th>
                        <th scope="col">Áfa(%)</th>
                        <th scope="col">Összesen</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php for($i = 1;$i < $_SESSION["basketCount"]; $i++) : ?>
                        <?php if(!empty($_SESSION["basketProduct"][$i])) : ?>
                            <tr>
                                <?php include_once "basketLogic/productDetail.php"; ?>
                                <th><?php echo $_SESSION["basketProduct"][$i] ?></th>
                                <td><?php echo $_SESSION["basketQuantity"][$i] ?></td>
                                <td><?php echo $result["product_price"]." Ft" ?></td>
                                <td><?php echo $result["product_vat"] ?></td>
                                <td><?php echo $result["product_price"] * $_SESSION["basketQuantity"][$i]." Ft" ?></td>
                                <td><button class="btn btn-danger float-right" onclick="deleteBasketItem(<?php echo $i ?>)"><i class="material-icons">delete</i></button></td>
                            </tr>
                        <?php endif; ?>
                    <?php endfor; ?>
                    </tbody>
                    </table>
            <?php else : ?>
                    <div class="alert alert-warning">
                        A kosár üres!
                    </div>
            <?php endif; ?>
            <hr>
            <a href="basketLogic/commitBasket.php" class="btn btn-info">Véglegesítés</a>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="basket_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal_body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer" id="modal_footer">
        
      </div>
    </div>
  </div>
</div>

<?php include_once "includes/footer.php" ?>
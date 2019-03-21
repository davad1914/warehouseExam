<?php 
    include_once "includes/header.php";
    include_once "includes/navbar.php";
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Felhasználó szerkesztése</h4>
        </div>
        <div class="card-body">
            <?php include_once "userLogic/userForm.php" ?>
        </div>
    </div>
</div>
<?php include_once "includes/footer.php" ?>
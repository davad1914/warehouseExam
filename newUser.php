<?php 
    require_once "includes/header.php";
    require_once "includes/navbar.php";
?>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Felhasználó regisztrálása:</h5>
            </div>
            <div class="card-body">
                <?php require_once "userLogic/userForm.php" ?>
            </div>
        </div>
    </div>

<?php include_once "includes/footer.php" ?>
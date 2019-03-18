<?php
    include_once "includes/header.php";
    include_once "includes/navbar.php";
    include_once "includes/insertToDatabase.php";
    $kek = 0;
?>

<div class="container">
<div class="card">
    <div class="card-header" style="background-color: #ffab96;">
        <h4>Termék Hozzáadása</h4>
    </div>
    <div class="card-body">
        <?php include_once "includes/productForm.php" ?>
    </div>
</div>
<br>

<?php include_once "includes/footer.php" ?>
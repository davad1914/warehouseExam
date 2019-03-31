<?php include_once "includes/loginChecker.php" ?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffab96;">
    <a class="navbar-brand" href="#">
      <img src="img/logo/miniLogo.png" href="logged.php" width="30" height="30" alt="">
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="stockList.php">Raktárak<span class="sr-only">(jelenlegi)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Számlák
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="supplyList.php">Beszerzési számlák</a>
            <a class="dropdown-item" href="orderList.php">Megrendelési Számlák</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Termékek
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="products.php">Termék lista</a>
          <a class="dropdown-item" href="newProduct.php">Felvitel az adatbázisba</a>
          <a class="dropdown-item" href="addProductToStock.php">Felvitel a raktárba</a>
        </div>
      </li>
      <?php if(isset($_SESSION["user_role"]) && $_SESSION["user_role"] == "1") : ?>
      <li class="nav-item">
        <a class="nav-link" href="userList.php">Felhasználók kezelése</a>
      </li>
      <?php endif; ?>
    </ul>
    <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
        <li class="nav-item">
          <a href="basketList.php" class="nav-link"><i class="material-icons">shopping_basket</i></a>
        </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">
              account_box
            </i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="includes/profile.php">Profil</a>
            <a class="dropdown-item" href="includes/signout.php">Kijelentkezés</a>
          </div>
        </li>
        </ul>
  </div>
</nav>
<br>
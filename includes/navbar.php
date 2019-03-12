<?php include_once "includes/loginChecker.php" ?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffab96;">
  <a class="navbar-brand" href="logged.php"> 
    <i class="material-icons">
      fiber_smart_record
    </i>
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
          Termékek
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="products.php">Klistázás</a>
          <a class="dropdown-item" href="newProduct.php">Felvitel</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Folyamatok
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="addProductToStock.php">Termékek felvitele</a>
          <a class="dropdown-item" href="#">Kiszállítás</a>
        </div>
      </li>
      <?php if(isset($_SESSION["user_role"]) && $_SESSION["user_role"] == "1") : ?>
      <li class="nav-item">
        <a class="nav-link" href="userList.php">Felhasználók kezelése</a>
      </li>
      <?php endif; ?>

    </ul>
    <form  method="POST" class="form-inline my-2 my-lg-0">
      <button class="btn btn-info my-2 my-sm-0" type="submit" name="signoutButton">Kijelentkezés</button>
      <?php include_once "includes/signout.php" ?>
    </form>
  </div>
</nav>
<br>
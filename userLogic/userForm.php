<?php
    require_once "includes/db.php";
    $db = db::get();

    $roleQueryString = "SELECT `role_id`, `role_name` FROM `role` ORDER BY `role_name` ASC";
    $role = $db->getArray($roleQueryString);

    $companiesQueryString = "SELECT `company_id`, `company_name` FROM `own_companies` ORDER BY `company_name` ASC";
    $companies = $db->getArray($companiesQueryString);

    if(isset($_GET["user"]) && $_GET["user"] != ""){
        $selectQueryString = "SELECT * FROM `users` WHERE `user_id` =".$_GET["user"];
        $user = $db->getRow($selectQueryString);
        $name = explode(" ",$user['user_full_name']);
    }
?>

<style>
#message {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   text-align: center;
   margin-bottom: 0;
}
</style>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="userLogic/userFormValidate.js"></script>

<form method="POST" action="<?php echo (isset($user) ? "userLogic/updateUser.php?user=".$user["user_id"] : "userLogic/userSignup.php") ?>">
<!----------------------------------------- MSG ----------------------------------------------------------->

        <?php if(isset($_GET["msg"]) && $_GET["msg"] == "success") :?>
            <div tabindex="2" class="alert alert-success" style="display: none;" role="alert" style="" id="message">
                Sikeres feltöltés!
            </div>
        <?php endif; ?>
        <?php if(isset($_GET["error"]) && $_GET["error"] != "") :?>
            <div class="alert alert-danger" style="display: none;" role="alert" style="" id="message">
                <?php 
                    echo ($_GET["error"] == "empty" ? "Minden mező kitöltése kötelező!" : "" );
                    echo ($_GET["error"] == "db" ? "Ismeretlen hiba, kérem forduljon rendszergazdához!" : "" );
                ?>
            </div>
        <?php endif; ?>

<!----------------------------------------- MSG ----------------------------------------------------------->
<!----------------------------------------- Felhasználónév ------------------------------------------------>
        <div class="form-group">
            <label for="username">Felhasználónév</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="exampleuser123"
                value="<?php echo (isset($user['username']) ? $user['username'] : "" ) ?>"
            >
            <div id="feedback"></div>
        </div>
<!----------------------------------------- Felhasználónév ------------------------------------------------>
<!----------------------------------------- Vezetéknév, keresztnév ---------------------------------------->
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="lastName">Vezetéknév</label>
        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Will"
            value="<?php echo (isset($name[0]) ? $name[0] : "" ) ?>"
        >
        </div>
        <div class="form-group col-md-6">
        <label for="firstName">Keresztnév</label>
        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Smith"
            value="<?php echo (isset($name[1]) ? $name[1] : "" ) ?>"
        >
        </div>
    </div>
<!--------------------------------------------------- Email cím ------------------------------------------------------->
    <div class="form-group">
        <label for="emailInput">Email cím</label>
        <input type="text" class="form-control" id="emailInput" name="emailInput" placeholder="example@example.hu"
            value="<?php echo isset($user["user_email"]) ? $user["user_email"] : "" ?>"
        >
    </div>    
    <!-------------------------------------- Cég select és Jogosultság -------------------------------------------------->
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="companySelect">Cég</label>
            <select id="companySelect" name="companySelect" class="form-control">
                <?php if(isset($companies) && count($companies) > 0) :?>
                    <option>Válassz...</option>
                    <?php foreach($companies as $listItem) :?>

                        <option value="<?php echo $listItem["company_id"]; ?>" <?php echo (isset($user["user_company"]) && $user["user_company"] == $listItem["company_id"] ? "selected" : "") ?>>
                            <?php echo $listItem["company_name"]; ?>
                        </option>

                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
                <small class="form-text text-muted">Cég felvitelhez kattints 
                    <a id="companyModal" href="" data-toggle="modal" data-target="#insertModal">
                        ide
                    </a>!
                </small>
        </div>
        <div class="form-group col-md-6">
            <label for="roleSelect">Jogosultság</label>
            <select id="roleSelect" name="roleSelect" class="form-control">
                <?php if(isset($role) && count($role) > 0) :?>
                    <option selected>Válassz...</option>
                        <?php foreach($role as $listItem) :?>
                            <option value="<?php echo $listItem["role_id"]; ?>" <?php echo (isset($user["user_role"]) && $user["user_role"] == $listItem["role_id"] ? "selected" : "") ?>>
                                <?php echo $listItem["role_name"]; ?>
                            </option>
                        <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
    </div>

    <?php if(!isset($user)) : ?>
        <!------------------------------------------ Jelszó ----------------------------------------------------------->
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="passwordInput">Jelszó</label>
            <input type="password" class="form-control" id="passwordInput" name="passwordInput" placeholder="Jelszó"
                value="<?php echo (isset($user['user_password']) ? $user['user_password'] : "" ) ?>"
            >
            </div>
            <div class="form-group col-md-6">
            <label for="passwordAgainInput">Jelszó mégegyszer</label>
            <input type="password" class="form-control" id="passwordAgainInput" name="passwordAgainInput" placeholder="Jelszó mégegyszer">
            </div>
        </div>
        <!--------------------------------------------- Profilkép feltöltés -------------------------------------------------->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="userPictureInput">Profilkép</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="userPictureInput" name="userPictureInput" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="userPictureInput">Válassz képet</label>
                </div>
            </div>
    <?php endif; ?>
    <!-------------------------------------------------- Telefonszám ---------------------------------------------------------->
        <div class="form-group <?php echo (!isset($user)) ? col-md-6 : "" ?>">
            <label for="phoneNumberInput">Telefonszám</label>
            <input type="text" class="form-control" id="phoneNumberInput" name="phoneNumberInput" placeholder="+36 30 123 1234"
                value="<?php echo (isset($user['user_phone_number']) ? $user['user_phone_number'] : "" ) ?>"
            >
        </div>
    </div>
        <!---------------------------------------------- Submit button ----------------------------------------------->
        <button type="submit" class="btn btn-primary" name="registerButton">Módosítás</button>
        <a class="btn btn-warning" href="userList.php">Mégse</a>
</form>

<!--------------------------------------- Modal ------------------------------------------------->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalHeader">Elem beillesztése</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
                <div class="modal-body">
                    <form id="my-form" method="POST" action="">
                        <div class="form-group" id="modalInputFiled">
                                <!--<div id="manufacturerInputs" style="display: none">
                                    <label for="modalInput" id="modalBody">Gyártó címe:</label>
                                    <input type="text" class="form-control" id="modalInput" name="modalInput">

                                    <label for="modalInput" id="modalBody">Gyártó Email címe</label>
                                    <input type="text" class="form-control" id="modalInput" name="modalInput">
                                </div>-->
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Mégse</button>
                    <button type="button" class="btn btn-info" id="kek" onclick="validateModal()">Hozzáadás</button>
                </form>
                </div>
    </div>
  </div>
</div>
<!--------------------------------------- Modal ------------------------------------------------->
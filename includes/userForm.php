<?php
    require_once "db.php";
    $db = db::get();

    $roleQueryString = "SELECT `role_id`, `role_name` FROM `role` ORDER BY `role_name` ASC";
    $role = $db->getArray($roleQueryString);

    $companiesQueryString = "SELECT `company_id`, `company_name` FROM `own_companies` ORDER BY `company_name` ASC";
    $companies = $db->getArray($companiesQueryString);
?>

<form method="POST" action="includes/signup.php">
<!----------------------------------------- Felhasználónév ------------------------------------------------>
        <div class="form-group">
            <label for="username">Felhasználónév</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="exampleuser123">
        </div>
<!----------------------------------------- Felhasználónév ------------------------------------------------>
<!----------------------------------------- Vezetéknév, keresztnév ---------------------------------------->
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="lastName">Vezetéknév</label>
        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Will">
        </div>
        <div class="form-group col-md-6">
        <label for="firstName">Keresztnév</label>
        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Smith">
        </div>
    </div>
<!--------------------------------------------------- Email cím ------------------------------------------------------->
    <div class="form-group">
        <label for="emailInput">Email cím</label>
        <input type="text" class="form-control" id="emailInput" name="emailInput" placeholder="example@example.hu">
    </div>    
    <!-------------------------------------- Cég select és Jogosultság -------------------------------------------------->
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="companySelect">Cég</label>
            <select id="companySelect" name="companySelect" class="form-control">
                <?php if(isset($companies) && count($companies) > 0) :?>
                    <option selected>Válassz...</option>
                    <?php foreach($companies as $listItem) :?>
                        <option value="<?php echo $listItem["company_id"]; ?>"><?php echo $listItem["company_name"]; ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="roleSelect">Jogosultság</label>
            <select id="roleSelect" name="roleSelect" class="form-control">
                <?php if(isset($role) && count($role) > 0) :?>
                    <option selected>Válassz...</option>
                        <?php foreach($role as $listItem) :?>
                            <option value="<?php echo $listItem["role_id"]; ?>"><?php echo $listItem["role_name"]; ?></option>
                        <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
    </div>

    <!------------------------------------------ Jelszó ----------------------------------------------------------->
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="passwordInput">Jelszó</label>
        <input type="password" class="form-control" id="passwordInput" name="passwordInput" placeholder="Jelszó">
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
        <div class="form-group col-md-6">
            <label for="phoneNumberInput">Telefonszám</label>
            <input type="text" class="form-control" id="phoneNumberInput" name="phoneNumberInput" placeholder="+36 30 123 1234">
        </div>
    </div>
    <!---------------------------------------------- Submit button ----------------------------------------------->
    <button type="submit" class="btn btn-primary" name="registerButton">Regisztráció</button>
    <a class="btn btn-warning" href="userList.php">Mégse</a>
</form>
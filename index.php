<?php 
    include_once "includes/header.php";
    session_start();
    if(isset($_SESSION["username"])){
        header("Location: logged.php");
    }
?>

<style>
    .centered {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding-top: 30px;
        padding-bottom: 30px;
        width: 40%
    }

    body{
        background-color: grey;
    }
</style>

<div class="centered jumbotron text-center">
    <h4>Bejelentkezés</h4>
    <form action="includes/login.php" method="POST">
        <?php if(isset($_GET["error"]) && $_GET["error"] != "") :?>
            <div class="alert alert-danger" role="alert">
                <?php 
                    echo ($_GET["error"] == "empty" ? "Minden mező kitöltése kötelező!" : "" );
                    echo ($_GET["error"] == "invalid" ? "Helytelen felhasználónév, vagy jelszó!" : "" );
                ?>
            </div>
        <?php endif; ?>
        <div class="form-group">
            <label for="userName">Felhasználó név</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Jelszó</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="loginButton">Bejelentkezés</button>
    </form>
</div>

<?php include_once "includes/footer.php" ?>
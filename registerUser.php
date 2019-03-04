<?php include_once "includes/header.php" ?>

<style>
    .centered {
        position: fixed;
        top: 50%;
        left: 50%;
        /* bring your own prefixes */
        transform: translate(-50%, -50%);
        padding-top: 30px;
        padding-bottom: 30px;
        width: 50%;
    }

    body{
        background-color: lightblue;
    }
</style>

<div class="jumbotron centered">
        <a href="index.php" class="btn btn-primary float-right"><- Vissza</a>
        <h4>Regisztráció</h4>
        <br>
    <div class="row">
        <div class="form-group col">
            <label for="username">Felhasználónév</label>
            <input type="text" id="username" class="form-control">
        </div>
        <div class="form-group col">
            <label for="email">Email cím</label>
            <input type="email" id="email" class="form-control">
        </div>
    </div>

    <div class="row">
        <div class="form-group col">
            <label for="password">Jelszó</label>
            <input type="password" id="password" class="form-control">
        </div>
        <div class="form-group col">
            <label for="passwordAgain">Jelszó mégegyszer</label>
            <input type="password" id="password2" class="form-control">
        </div>
    </div>
    
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Elfogadom a <a href="#">valamiket</a></label>
    </div>

    <button class="btn btn-primary">Regisztráció</button>
</div>

<?php include_once "includes/footer.php" ?>
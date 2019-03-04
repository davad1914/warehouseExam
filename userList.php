<?php 
    require_once "includes/header.php";
    require_once "includes/navbar.php";
?>

    <div class="container">
    <div class="card">
            <div class="card-header">
            <a class="btn btn-outline-danger mb-2 float-right" href="newUser.php">Új felhasználó felvétele</a>
                <form class="form-inline">
                    <label class="sr-only" for="inlineFormInputName2">Keresés</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Felhasználó">
                    <button type="submit" class="btn btn-outline-info mb-2">Keresés</button>
                </form>
                
            </div>
            <div class="card-body">
            <!--
                <div class="alert alert-warning" role="alert">
                    Jelenleg nincs raktár felvéve!
                </div>
            -->
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Név</th>
                        <th scope="col">Cég</th>
                        <th scope="col">Jog</th>
                        <th scope="col">Adatlap</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row" width="5%">1</th>
                        <td>Lakó Dávid</td>
                        <td>Saját cég</td>
                        <td>Dolgozó</td>
                        <td width="10%"><button class="btn btn-warning"><i class="material-icons md-dark">create</i></button></div></td>
                        </tr>
                        <tr>
                        <th scope="row" width="5%">1</th>
                        <td>Lakó János</td>
                        <td>Saját cég</td>
                        <td>Dolgozó</td>
                        <td width="10%"><button class="btn btn-warning"><i class="material-icons md-dark">create</i></button></div></td>
                        </tr>
                        <tr>
                        <th scope="row" width="5%">1</th>
                        <td>Lakó Jakab</td>
                        <td>Saját cég</td>
                        <td>Dolgozó</td>
                        <td width="10%"><button class="btn btn-warning"><i class="material-icons md-dark">create</i></button></div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require_once "includes/footer.php" ?>
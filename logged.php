<?php 
    include_once "includes/header.php";
    include_once "includes/navbar.php";
    require_once "includes/db.php";

    $db = db::get();

    $selectString = "SELECT * FROM ``"
?>
<br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="index.php" class="btn btn-primary float-right">+ Raktár felvétele</a>
                <h5>Raktárak:</h5>
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
                        <th scope="col">Neve</th>
                        <th scope="col">Címe</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row" width="5%">1</th>
                        <td>Egresi raktár</td>
                        <td>1120, Budapest, Kerepsei út 14/A</td>
                        <td width="10%"><button class="btn btn-primary"><i class="material-icons md-dark">create</i></button></div></td>
                        </tr>
                        <tr>
                        <th scope="row" width="5%">1</th>
                        <td>Egresi raktár</td>
                        <td>1120, Budapest, Kerepsei út 14/A</td>
                        <td width="10%"><button class="btn btn-primary"><i class="material-icons md-dark">create</i></button></div></td>
                        </tr>
                        <tr>
                        <th scope="row" width="5%">1</th>
                        <td>Egresi raktár</td>
                        <td>1120, Budapest, Kerepsei út 14/A</td>
                        <td width="10%"><button class="btn btn-primary"><i class="material-icons md-dark">create</i></button></div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include_once "includes/footer.php" ?>
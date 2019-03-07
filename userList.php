<?php 
    require_once "includes/header.php";
    require_once "includes/navbar.php";
    include_once "includes/db.php";
    $selectQuery = "SELECT *
    FROM ((users
    INNER JOIN role ON users.user_role = role.role_id)
    INNER JOIN own_companies ON users.user_company = own_companies.company_id);";
    $db = db::get();
    $list = $db->getArray($selectQuery);
?>

<style>
    .quadrat {
        background-color: #ccffcc;
        -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
        -webkit-animation-duration: 4s; /* Safari 4.0 - 8.0 */
        animation-name: example;
        animation-duration: 4s;
        }

        /* Safari 4.0 - 8.0 */
        @-webkit-keyframes example {
        0%   {background-color: #33ff33;}
        25%  {background-color: #66ff66;}
        50%  {background-color: #99ff99;}
        100% {background-color: #ccffcc;}
        }

        /* Standard syntax */
        @keyframes example {
        0%   {background-color: #33ff33;}
        25%  {background-color: #66ff66;}
        50%  {background-color: #99ff99;}
        100% {background-color: #ccffcc;}
    }
</style>

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
                <?php if(isset($list) && $list != "") :?>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Név</th>
                            <th scope="col">Felhasználónév</th>
                            <th scope="col">Cég</th>
                            <th scope="col">Jog</th>
                            <th scope="col">Szerkesztés</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($list as $listItem) : ?>
                                <tr <?php echo (isset($_GET["success"]) && $listItem["user_id"] == $_GET["success"] ) ? 'class="quadrat"'/*'style="background-color: #b3ffb3;"'*/ : "" ?>>
                                <td><?php echo $listItem["user_full_name"] ?></td>
                                <td><?php echo $listItem["username"] ?></td>
                                <td><?php echo $listItem["company_name"] ?></td>
                                <td><?php echo $listItem["role_name"] ?></td>
                                <td width="10%"><a class="btn btn-warning" href="userModification.php?user=<?php echo $listItem["user_id"] ?>"><i class="material-icons md-dark">create</i></a></div></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else :?>
                    <div class="alert alert-warning" role="alert">
                        Jelenleg nincs user felvéve!
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php require_once "includes/footer.php" ?>
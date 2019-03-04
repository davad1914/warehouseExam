<?php
if(isset($_POST["signoutButton"])){
    session_unset(); 
    header('Location: index.php');
    exit();
}
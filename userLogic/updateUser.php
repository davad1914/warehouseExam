<?php
if(isset($_POST["registerButton"])){
include_once "../includes/db.php";
$db = db::get();

$username = $_POST["username"];
$user_full_name = $_POST["lastName"]." ".$_POST["firstName"];
$user_email = $_POST["emailInput"];
$user_company = $_POST["companySelect"];
$user_role = $_POST["roleSelect"];
$user_phone_number = $_POST["phoneNumberInput"];

$updateString = "UPDATE `users` SET 
    `username`='".$username."',
    `user_full_name`='".$user_full_name."',
    `user_email`='".$user_email."',
    `user_role`=".$user_role.",
    `user_company`= ".$user_company.",
    `user_phone_number`= ".$user_phone_number." WHERE `user_id` = ".$_GET["user"]."";

$db->query($updateString);
Header('Location: ../userList.php?success='.$_GET["user"]);
}
?>
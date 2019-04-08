<?php
if(isset($_POST["registerButton"])){
include_once "../includes/db.php";
$db = db::get();

$username = $db->escape($_POST["username"]);
$user_full_name = $db->escape($_POST["lastName"]." ".$_POST["firstName"]);
$user_email = $db->escape($_POST["emailInput"]);
$user_company = $db->escape($_POST["companySelect"]);
$user_role = $db->escape($_POST["roleSelect"]);
$user_phone_number = $db->escape($_POST["phoneNumberInput"]);

$updateString = "UPDATE `users` SET 
    `username`='".$username."',
    `user_full_name`='".$user_full_name."',
    `user_email`='".$user_email."',
    `user_role`=".$user_role.",
    `user_company`= ".$user_company.",
    `user_phone_number`= ".$user_phone_number." WHERE `user_id` = ".$_GET["user"];

$db->query($updateString);
Header('Location: ../userList.php?success='.$_GET["user"]);
}
?>
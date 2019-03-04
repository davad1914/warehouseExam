<?php

if(isset($_POST["registerButton"]))
{
            require_once "db.php";
            $username = $_POST["username"];
            $lastName = $_POST["lastName"];
            $firstName = $_POST["firstName"];
            $password = $_POST["passwordInput"];
            $passwordAgain = $_POST["passwordAgainInput"];
            $email = $_POST["emailInput"];
            $company = $_POST["companySelect"];
            $role = $_POST["roleSelect"];
            $profilePicture = $_POST["userPictureInput"];
            $phoneNumber = $_POST["phoneNumberInput"];
    
                if(
                    empty($username) ||
                    empty($lastName) || 
                    empty($firstName) || 
                    empty($password) || 
                    empty($email) || 
                    empty($company) ||
                    empty($role) ||
                    empty($profilePicture) ||
                    empty($phoneNumber)
                ){
                    header('Location: ../newUser.php?msg=error');
                }else{
                    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
                    $queryString = 
                    "INSERT INTO 
                        `users`(`username`, `user_full_name`, `user_email`, `user_password`, `user_role`, `user_company`, `user_image_url`, `user_phone_number`) 
                    VALUES 
                        ('".$username."', '".$lastName." ".$firstName."', '".$email."', '".$hashPassword."', '".$role."', '".$company."', '".$profilePicture."', '".$phoneNumber."')";
                    $db = db::get();
                    $db->query($queryString);
                    header('Location: ../newUser.php?msg=success');
                }
}
?>
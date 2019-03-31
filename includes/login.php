    <?php
    session_start();
        include_once "db.php";
        $db = db::get();
        $username = $_POST["username"];
        $password = $_POST["password"];

        if(empty($username) || empty($password))
        {
            header("Location: ../index.php?error=empty");
        }
        else
        {
            $selectString = "SELECT * FROM `users` WHERE username='".$username."'";
            $row = $db->getRow($selectString);
            if($row != 0){
            $passhash = password_verify($password, $row['user_password']);
                if($passhash == false)
                {
                    header("Location: ../index.php?error=invalid");
                }
                elseif($passhash === true)
                {
                    $_SESSION["user_id"] = $row["user_id"];
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["user_company"] = $row["user_company"];
                    $_SESSION["user_role"] = $row["user_role"];
                    header("Location: ../logged.php?login=success");
                }
            }else{
                header("Location: ../index.php?error=invalid");
            }             
        }       
    
?>
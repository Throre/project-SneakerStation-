<?php
    session_start();    
    include "../../config/connect.php"; 
    include "../../config/base_url.php";

    if(isset($_POST["email"], $_POST["password"]) &&
    strlen($_POST["email"]) > 0 &&
    strlen($_POST["password"]) > 0 
    ){
        $email = $_POST["email"];
        $user_password = $_POST["password"];
    
        $prep = mysqli_prepare($con, "SELECT id, name, last_name FROM user WHERE email=? AND password=?");
        mysqli_stmt_bind_param($prep, "ss", $email, $user_password);
        mysqli_stmt_execute($prep);
        $query = mysqli_stmt_get_result($prep);

        if(mysqli_num_rows($query) == 0){
            header("Location: $BASE_URL/login.php?error=9");
            exit();
        }
        
        $row = mysqli_fetch_assoc($query);

        $_SESSION["user_id"] = $row["id"];
        $_SESSION["user_name"] = $row["name"];
        $_SESSION["user_last_name"] = $row["last_name"];

        header("Location: $BASE_URL/profile.php");
    }else{
        header("Location: $BASE_URL/login.php?error=10");
    }

    

    
?>
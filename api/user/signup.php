<?php
    include "../../config/connect.php"; 
    include "../../config/base_url.php";

    if(isset($_POST["email"], $_POST["name"], $_POST["last_name"], $_POST["password"], $_POST["password2"]) &&
    strlen($_POST["email"]) > 0 &&
    strlen($_POST["name"]) > 0 &&
    strlen($_POST["last_name"]) > 0 &&
    strlen($_POST["password"]) > 0 &&
    strlen($_POST["password2"]) > 0
    ){
        $email = $_POST["email"];
        $user_name = $_POST["name"];
        $user_last_name = $_POST["last_name"];
        $user_password = $_POST["password"];
        $user_password2 = $_POST["password2"];
        if($user_password != $user_password2){
            header("Location: $BASE_URL/register.php?error=5");
            // ('Passwords do not match');
            exit();
        }
        $prep = mysqli_prepare($con, "SELECT id FROM user WHERE email=?");
        mysqli_stmt_bind_param($prep, "s", $email);
        mysqli_stmt_execute($prep);
        $query = mysqli_stmt_get_result($prep);

        if(mysqli_num_rows($query) > 0){
            header("Location: $BASE_URL/register.php?error=7");
        }
        
        $prep1 = mysqli_prepare($con, "INSERT INTO user (email, name, last_name, password) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($prep1, "ssss", $email, $user_name, $user_last_name, $user_password);
        mysqli_stmt_execute($prep1);

        header("Location: $BASE_URL/login.php");
    }else{
        header("Location: $BASE_URL/register.php?error=6");

    }

    

    
?>
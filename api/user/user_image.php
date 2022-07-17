<?php
    session_start();
    include "../../config/connect.php"; 
    include "../../config/base_url.php";

    if(isset($_FILES["image"], $_FILES["image"]["name"]) &&
    strlen($_FILES["image"]["name"]) > 0
    
    ){
        $ext = end(explode(".", $_FILES["image"]["name"]));
        $user_image = time().".".$ext;

        move_uploaded_file($_FILES["image"]["tmp_name"],"../../images/user_img/$user_image");

        $path = "/images/user_img/".$user_image; 
        $user_id = $_SESSION["user_id"];

        $prep = mysqli_prepare($con, "INSERT INTO `user_images` (image, user_id) VALUES (?, ?)");
        mysqli_stmt_bind_param($prep, "si", $path, $user_id); 
        mysqli_stmt_execute($prep);

        header("Location: $BASE_URL/profile.php");
    }else{
        header("Location: $BASE_URL/profile.php?error=12");
    }

    
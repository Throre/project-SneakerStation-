<?php
    session_start();
    include "../../config/connect.php";
    include "../../config/base_url.php";

    $prod_id = $_GET["id"];

    if(isset($_GET["id"], $_SESSION["user_id"]) &&
    intval($_GET["id"]) > 0){
        
        $query = mysqli_query($con, "SELECT * FROM products WHERE id = $prod_id");
        $row = mysqli_fetch_assoc($query);
        $image = $row["image"];
        $product_name = $row["name"];
        $price = $row["price"];
        $user_id = $_SESSION["user_id"];

        if($row["user_id"] != $user_id){
            $prep = mysqli_prepare($con, "INSERT INTO like_list (product_id, author_id, product_image, product_name, price) VALUES (?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($prep, "iissi", $prod_id, $user_id, $image, $product_name, $price);
            mysqli_stmt_execute($prep);
            header("Location: $BASE_URL/all_prod.php");
        }else{
            header("Location: $BASE_URL/register.php");
        }
        
    }else{
        // header("Location: $BASE_URL/like.php?error=16");
        header("Location: $BASE_URL/register.php");
    }
<?php
session_start();
    include "../../config/connect.php";
    include "../../config/base_url.php";

    if(isset($_POST["name"], $_POST["brand"], $_POST["price"], $_POST["sex"], $_FILES["image"], $_FILES["image"]["name"], $_POST["description"], $_SESSION["user_id"]) &&
    strlen($_POST["name"] > 0) && 
    strlen($_POST["brand"] > 0) &&
    strlen($_POST["price"] > 0) &&
    strlen($_POST["sex"] > 0) &&
    strlen($_FILES["image"]["name"] > 0) &&
    strlen($_POST["description"] > 0)
    

    ){  
        $prod_name = $_POST["name"];
        $prod_brand = $_POST["brand"];
        $prod_price = $_POST["price"];
        $prod_sex = $_POST["sex"];
        $prod_desc = $_POST["description"];
        $user_id_added = $_SESSION["user_id"];

        $ext = end(explode(".", $_FILES["image"]["name"]));
        $image_name = time().".".$ext;

        move_uploaded_file($_FILES["image"]["tmp_name"], "../../images/products_img/$image_name");

        $path = "/images/products_img/".$image_name;
        

        $prep = mysqli_prepare($con, "INSERT INTO products (name,  brand, price, sex, image, description, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($prep, "ssisssi", $prod_name, $prod_brand, $prod_price, $prod_sex, $path, $prod_desc, $user_id_added); 
        mysqli_stmt_execute($prep);

        header("Location: $BASE_URL/index.php");
    }else{
        header("Location: $BASE_URL/new_product.php?error=1");
    }


    

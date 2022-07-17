<?php
    session_start();
    include "../../config/connect.php";
    include "../../config/base_url.php";

    if(isset($_GET["id"], $_SESSION["user_id"]) && 
        intval($_GET["id"])){

            $id = $_GET["id"];
            $user_id = $_SESSION["user_id"];

            $query_delete = mysqli_query($con, "DELETE  FROM products WHERE id = $id AND user_id = $user_id");

            header("Location: $BASE_URL/profile.php?name=".$_SESSION["user_name"]);
        }else{
            header("Location: $BASE_URL/profile.php?error=14");
        }
?>


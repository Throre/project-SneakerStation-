<?php
    session_start();
    include "../../config/connect.php";
    include "../../config/base_url.php";

    if(isset($_GET["id"]) && intval($_GET["id"])){
        $id = $_GET["id"];
        $query = mysqli_query($con, "SELECT * FROM user_images WHERE user_id = $id"); 
        $row = mysqli_fetch_assoc($query);
        $image_id = $row["id"];

        $query_delete = mysqli_query($con, "DELETE FROM user_images WHERE id = $image_id AND user_id = $id");

            header("Location: $BASE_URL/profile.php?name=".$_SESSION["user_name"]);
        }else{
            header("Location: $BASE_URL/profile.php?error=14");
        }
?>
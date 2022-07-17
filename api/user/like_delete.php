<?php
    session_start();
    include "../../config/connect.php";
    include "../../config/base_url.php";

    if(isset($_GET["id"], $_SESSION["user_id"]) && intval($_GET["id"])){
        $id = $_GET["id"];
        $user_id = $_SESSION["user_id"];

        $query_delete = mysqli_query($con, "DELETE FROM like_list WHERE id = $id AND author_id = $user_id"); 
        
            header("Location: $BASE_URL/like_list.php");
        }else{
            header("Location: $BASE_URL/like_list.php?error=17");
        }
?>
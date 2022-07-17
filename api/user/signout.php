<?php
    include "../../config/base_url.php";

    session_start();
    unset($_SESSION["user_id"]);
    session_destroy();

    header("Location:$BASE_URL/index.php");
?>
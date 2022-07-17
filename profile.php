<?php
    include "config/connect.php";
    include "config/base_url.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <?php
        include "config/head.php";
    ?>
</head>
<body>
    <?php
        include "config/header.php";
    ?>
    <h2 class="prod_added_title">Your products</h2>
    <section class="user_profile">
        
        <div class="prod_added_list">
            
            <?php
            $query_prod = mysqli_query($con, "SELECT * FROM products WHERE user_id = $_SESSION[user_id]");
            if(mysqli_num_rows($query_prod) > 0){
                while($row_prod = mysqli_fetch_assoc($query_prod)){
            ?> 
            <div class="horizontal_line"></div>
                <div class="prod_item">
                    <h3 class="prod_name"><?=$row_prod["name"]?></h3>
                    <img src="<?=$BASE_URL?><?=$row_prod["image"]?>" alt="">
                    
                    <p><?=$row_prod["date"]?></p>
                        
                    <span class="link">
                        <img src="images/dots(1).svg" alt="">
                        <ul class="dropdown">
                            <li><a href="<?=$BASE_URL?>/change_prod.php?id=<?=$row_prod["id"]?>" class="change_prod">Change product</a></li>
                            <li><a href="<?=$BASE_URL?>/api/catalog/delete_prod.php?id=<?=$row_prod["id"]?>" class="delete_prod">Delete product</a></li>
                        </ul>
                    </span>
                        
                </div>
                
                
            <?php
                }
            }else{
            ?>    
                <h1 class="no_prod">No products added</h1>
            <?php    
            }
            ?>
                   

        </div>
        <div class="vertical_line"></div>
    <?php
        if(isset($_SESSION["user_id"])){
            $query = mysqli_query($con, "SELECT image FROM user_images WHERE user_id = $_SESSION[user_id]");
            $row = mysqli_fetch_assoc($query);
            $user_id = $_SESSION["user_id"];
    ?>
        <form class="profile_container" action="api/user/user_image.php" method="POST" enctype="multipart/form-data">
            <fieldset class="profile_fieldset">
                <div class="profile_info">
                    <h3>Hi, <?=$_SESSION["user_name"]?></h3>
                    <?php
                        if(isset($row["image"]) > 0 &&
                        strlen($row["image"]) > 0
                        ){
                        $query = mysqli_query($con, "SELECT image FROM user_images WHERE user_id = $_SESSION[user_id]");
                        $row = mysqli_fetch_assoc($query);
                    ?>      
                        <span class="profile_image">
                            <img src="<?=$BASE_URL?><?=$row["image"]?>" alt="">
                        </span>
                        <div class="profile_buttons">
                            <img class="dropdown_img" src="images/dots(1).svg" alt="">
                            <span class="profile_dropdown">
                                <a href="<?=$BASE_URL?>/api/user/delete_image.php?id=<?=$_SESSION["user_id"]?>" class="delete_button" name="delete_item">Delete image</a>
                            
                            </span>
                        </div>
                <?php        
                    }else{
                ?>  
                        <span class="profile_image">
                            <img src="images/user_img/default_avatar.png" alt="">
                        </span>
                        <div class="default_image">
                            <input id="user_image" type="file" name="image">
                            <button type="submit">Send picture</button>
                        </div>
                        
                </div>
                
                <?php
                    }
                ?>
                    
        <?php            
            }      
        ?>      
                
                
            </fieldset>
        </form>  
    </section>            

          
        <div class="line"></div> 
    
    <?php
        include "config/footer.php";
    ?>
    <?php
        include "config/script.php";
    ?>
</body>
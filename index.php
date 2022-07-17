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
    <title>Sneaker Station</title>
    <?php
        include "config/head.php";
    ?>
</head>
<body>
    <?php
        include "config/header.php";
    ?>
    
    
    <section class="slider">
        <?php
            $query = mysqli_query($con, "SELECT * FROM products");
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
        ?>
            <div class="slider_item">
            <h2><?= $row["name"]?></h2>
            <a href="<?=$BASE_URL?>/prod_page.php?id=<?=$row["id"]?>">
                <img src="<?=$BASE_URL?><?=$row["image"]?>" alt="">
            </a>
            <h2><?= $row["price"]?> USD</h2>
        </div>

        <?php

                }
            }else{
        ?>        
                <div class="main_background">
                    <img src="images/login_background.webp" alt="">
                </div>  
        <?php           
            }
        ?>
        
    </section>
    <br>
    <br>
    <div class="line">
    </div> 
    
    <?php
        include "config/footer.php";
    ?>
    <?php
        include "config/script.php";
    ?>
    
</body>
</html>
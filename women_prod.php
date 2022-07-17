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
    <title>Women Collection</title>
    <?php
        include "config/head.php";
    ?>
</head>
<body>
    <?php
        include "config/header.php";
    ?>
        <?php
            $query = mysqli_query($con, "SELECT * FROM products WHERE `sex` != 'male'");

            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    $prod_id = $row["id"];
                    $prod_id = $row["id"];
        ?>            
                <div class="product_container">

                    <div class="product_description">
                        <h2><?=$row["name"]?></h2>
                        <img src="<?=$BASE_URL?><?=$row["image"]?>" alt="">
                    </div>

                    <div class="product_description">
                        <h2>Product Description</h2>
                        <h3><?=$row["description"]?></h3>
                        
                        <div class="product_info">
                            <a class="details"  href=""><img src="images/dots(1).svg" alt=""></a>
                            <div class="info_dropdown">
                                <h2>Product Brand: <?=$row["brand"]?></h2>
                                <h2>Gender: <?=$row["sex"]?></h2>
                                <h2>Price: <?=$row["price"]?> USD</h2>
                            </div>
                            
                        </div>

                        <?php
                        if(isset($_SESSION["user_id"])){
                    ?>
                        <div class="order">
                            <div class="order_container">
                                <a class="product_like" href="<?=$BASE_URL?>/api/catalog/like.php?id=<?=$prod_id?>">Like this product</a>
                            </div>
                            <div class="order_container">
                                <a class="product_add" href="<?=$BASE_URL?>/api/catalog/wish.php?id=<?=$prod_id?>">Add to wish list</a>
                            </div>
                        </div>
                    <?php
                        }else{
                    ?>  
                               
                    <?php
                        }
                    ?>
                    </div>
                </div>
               
                <div class="line">
                </div>
            <?php        
                }
            }
            ?>        
    <?php
        include "config/footer.php";
    ?>
    <?php
        include "config/script.php";
    ?>
</body>
</html>
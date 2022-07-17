<?php
   include "config/connect.php";
   include "config/base_url.php";
   $id = $_GET["id"];
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
    <section class="item_page_container">
        <?php
            $query_prod = mysqli_query($con, "SELECT * FROM products WHERE id = $id");
            $row_prod = mysqli_fetch_assoc($query_prod);
            $name = $row_prod["name"];
            $price = $row_prod["price"];
            $image = $row_prod["image"];
            $desc = $row_prod["description"];  
            $brand = $row_prod["brand"];
            $prod_id = $row_prod["id"];
        ?>
            <div class="item_container">
                <h2 class="item_container_name"><?=$name?></h2>
                <img src="<?=$BASE_URL?><?=$image?>" alt="">

                <div class="item_container_order">
                    <div class="order_container">
                        <a class="product_like" href="<?=$BASE_URL?>/api/catalog/like.php?id=<?=$prod_id?>">Like this product</a>
                    </div>
                    <div class="order_container">
                        <a class="product_add" href="<?=$BASE_URL?>/api/catalog/wish.php?id=<?=$prod_id?>">Add to wish list</a>
                    </div>
                </div>

                <div class="item_page_description">
                    <h2 class="desc">Product description</h2>
                    <h2><?=$desc?></h2>
                </div>

                <div class="item_container_info">
                    <h2 class="item_container_brand">Brand: <?=$brand?></h2>
                    <h2 class="item_container_price">Price: <?=$price?> USD</h2>
                </div>
                

            </div>







    </section>
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
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
    <title>Liked products</title>
    <?php
        include "config/head.php";
    ?>
</head>
<body>
    <?php
        include "config/header.php";
    ?>
    <h2 class="list_title">Liked Products</h2>
    <div class="list_container">
        
        <?php
            $query = mysqli_query($con, "SELECT * FROM like_list WHERE author_id = $_SESSION[user_id]");
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    $image = $row["product_image"];
                    $name = $row["product_name"];
                    $price = $row["price"];
                    $list_id = $row["id"];
                    $prod_id = $row["product_id"];
        ?>            
                    <div class="likelist_item">
                        <h3 class="likelist_name"><?=$row["product_name"]?></h3>
                        <a class="image_container" href="<?=$BASE_URL?>/prod_page.php?id=<?=$prod_id?>">
                            <img class="" src="<?=$BASE_URL?><?=$row["product_image"]?>" alt="">
                        </a>
                        
                        <h3 class="likelist_price"><?=$price?> USD</h3>
                        <div class="remove_button">
                            <a href="<?=$BASE_URL?>/api/user/like_delete.php?id=<?=$list_id?>">Remove from list<img src="<?=$BASE_URL?>/images/remove.svg" alt=""></a>
                        </div>
                        
                        
                        
                        
                    </div>
        <?php
                }      
            }else{
        ?>       
                <div class="no_prod_liked">
                    <h2>List is empty</h2>
                </div> 
                
        <?php        
            }         
        ?> 
        
    </div>

    <div class="line"></div> 


    <?php
        include "config/footer.php";
    ?>
    <?php
        include "config/script.php";
    ?>
</body>
</html>
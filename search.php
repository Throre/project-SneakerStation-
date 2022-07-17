<?php
    include "config/connect.php";
    include "config/base_url.php";
    $search = $_GET["search"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search results</title>
    <?php
        include "config/head.php";
    ?>
</head>
<body>
    <?php
        include "config/header.php"
    ?>
    <section class="search_page_container"> 
    <?php    
    if(isset($_GET["search"]) && strlen($_GET["search"]) > 0){
        $search = strtolower($_GET["search"]);
        
        $query_search = mysqli_query($con, "SELECT * FROM `products` WHERE `name` LIKE '%$search%' OR `brand` LIKE '%$search%' OR `sex` LIKE '%$search%'");
        while($row = mysqli_fetch_assoc($query_search)){
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

            </div>

                    
        </div> 

        <div class="line"></div>
    <?php
        }
    ?>        
            <!-- <div class="no_results">
                <h2>0 Results</h2>
            </div>

            <div class="line"></div> -->
    <?php    
        
    }else{
    ?>
        <div class="no_results">
            <h2>0 Results</h2>
        </div>

         
        <div class="line"></div>
    <?php    
    }
    ?>
</section>





















    



   <?php
      include "config/footer.php";
   ?>
   <?php
        include "config/script.php";
   ?>
</body>
</html>    
    
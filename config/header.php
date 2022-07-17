<?php
    session_start();
    include "base_url.php";
    include "connect.php";
?>

<div class="header">
    <div onclick="goToSite()" class="logo" id="logo">
        <img src="images/logo_ss1.jpg" alt="">
        <h1>Sneaker Station</h1>
    </div>

    <form class="search" method="GET" action="<?=$BASE_URL?>/search.php" enctype="multipart/form-data">
        <div class="search_container">
            <input type="text" name="search" placeholder="Search">
        </div>
        <div class="search_image">
            <button type="submit" class="search_button"></button>
        </div>
    </form>
    
    <div class="header_container">
        <div class="wish_list">
            <?php
                if(isset($_SESSION['user_id'])){
                    $user_id = $_SESSION['user_id'];
                    $query = mysqli_query($con, "SELECT `image` FROM `user_images` WHERE `user_id` = '$user_id'");
                    $row = mysqli_fetch_assoc($query);

                    if(mysqli_num_rows($query) > 0){
            ?>
                        <a href="<?=$BASE_URL?>/profile.php?name=<?=$_SESSION["user_name"]?>" class="wish_icon_prolife"><img src=" <?=$BASE_URL?><?=$row["image"]?>" alt=""></a>
                        <a href="<?=$BASE_URL?>/like_list.php?id=<?=$_SESSION["user_id"]?>" class="wish_icon"><img src="images/heart.svg" alt=""></a>
                        <a href="<?=$BASE_URL?>/wish_list.php?id=<?=$_SESSION["user_id"]?>" class="wish_icon"><img src="images/basket.svg" alt=""></a>
            <?php    
                    }else{
            ?>    
                        <a href="<?=$BASE_URL?>/profile.php?name=<?=$_SESSION["user_name"]?>" class="wish_icon"><img src="images/user.svg" alt=""></a>
                        <a href="<?=$BASE_URL?>/like_list.php?id=<?=$_SESSION["user_id"]?>" class="wish_icon"><img src="images/heart.svg" alt=""></a>
                        <a href="<?=$BASE_URL?>/wish_list.php?id=<?=$_SESSION["user_id"]?>" class="wish_icon"><img src="images/basket.svg" alt=""></a>
            <?php    
                    }
                }else{
                    ?>
                    <a href="<?=$BASE_URL?>/register.php" class="wish_icon"><img src="images/user.svg" alt=""></a>
                    <a href="<?=$BASE_URL?>/register.php" class="wish_icon"><img src="images/heart.svg" alt=""></a>
                    <a href="<?=$BASE_URL?>/register.php" class="wish_icon"><img src="images/basket.svg" alt=""></a>
            <?php    
                }

            ?>
            
        </div>
        <?php
            if(isset($_SESSION["user_id"])){
        ?>
            <div onclick="sign_out()" class="header_register">
                <div class="add_product">
                    <a href="new_product.php">Add Product</a>
                </div>
                <div class="register_container">
                    <a class="sign_out" href="<?=$BASE_URL?>/api/user/signout.php">Sign Out</a>
                </div>
            </div>
        <?php   
            }else{
        ?>       
            <div class="header_register">
                <div onclick="goToLogin()" class="register_container">
                    <a id="signin_button">Sign In</a>
                </div>    
                <div onclick="goToRegister()" class="register_container">
                    <a id="join_button">Join Us</a>
                </div>
            </div> 
                
        <?php        
            }
        ?>    
    </div>    

    

</div>

<div class="line">
</div>

<div class="catalog">
    <a href="<?=$BASE_URL?>/men_prod.php">Men</a>
    <a href="<?=$BASE_URL?>/women_prod.php">Women</a>
    <a href="<?=$BASE_URL?>/all_prod.php">All</a>
    <a href="<?=$BASE_URL?>/products.php">New Collection</a>
</div>

<div class="line">
</div>


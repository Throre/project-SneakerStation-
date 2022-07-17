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
    <title>New Product</title>
    <?php
        include "config/head.php"
    ?>
</head>
<body>
    <?php
        include "config/header.php"
    ?>
    <section class="new_prod_background">
        <div class="new_prod_title">
            <h2>Add your product</h2>   
        </div>
        <form class="new_prod_form" action="<?=$BASE_URL?>/api/catalog/add.php" method="POST" enctype="multipart/form-data">

            
            <div class="new_prod_container">
                
                <fieldset class="product_fieldset">
                    <h3>Write the name of product</h3>
                    <input class="input" type="text" name="name" placeholder="Product Name">
                </fieldset>

                <fieldset class="product_fieldset">
                    <h3>Product brand</h3>
                    <input class="input" type="text" name="brand" placeholder="Brand">
                </fieldset>

                <fieldset class="product_fieldset">
                    <div class="price_img">
                        <h3>Select item price</h3>
                        <img src="images/dollar1.png" alt="">
                    </div>
                    
                    <input class="input" type="text" name="price" placeholder="Price">
                    
                </fieldset>

                <fieldset class="product_fieldset">
                    <div>
                        <h3>Select gender</h3>
                        <div class="radio_input">
                            <input class="radio" type="radio" id="contactChoice1"   
                            name="sex" value="Male">
                            <label for="contactChoice1">Male</label>
                        </div>
                        <div class="radio_input">
                            <input class="radio" type="radio" id="contactChoice2"
                            name="sex" value="Female">
                            <label for="contactChoice2">Female</label>
                        </div>
                        <div class="radio_input"> 
                            <input class="radio" type="radio" id="contactChoice3"
                            name="sex" value="Unisex">
                            <label for="contactChoice3">Unisex</label>
                        </div>
                    </div>

                </fieldset>
            </div>

            <div class="new_prod_container">
                <fieldset class="product_fieldset">
                    <h3>Choose image</h3>
                    <div class="choose_file">
                        <label for="files" class="btn">Select Image</label>
                        <input name="image" id="files" style="visibility:hidden;" type="file">
                    </div>
                </fieldset>

                
                <fieldset class="product_fieldset">
                    <h3> Write a product description </h3>
                    <textarea class="description" name="description"></textarea>
                    <button class="add" type="submit">Add</button>
                </fieldset>
                
            </div>
            
        </form>
        
    </section>
    <div class="line">
    </div>
    <?php
        include "config/footer.php"
    ?>
    <?php
        include "config/script.php"
    ?>
</body>
</html>
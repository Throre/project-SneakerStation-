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
   <title>Register page</title>
   <?php
      include "config/head.php";
   ?>
</head>
<body>
   <?php
      include "config/header.php"
   ?>
   <section class="background"> 
      
      <div class="registration">
         <h2>Registration</h2>
         <form class="registration_form" action="<?=$BASE_URL?>/api/user/signup.php" method="POST">
            <fieldset class="registration_fieldset">
               <input class="input" type="text" name="email" placeholder="Enter Email">
            </fieldset>
            <fieldset class="registration_fieldset">
               <input class="input" type="text" name="name" placeholder="Enter Name">
            </fieldset>
            <fieldset class="registration_fieldset">
               <input class="input" type="text" name="last_name" placeholder="Enter Last Name">
            </fieldset>
            <fieldset class="registration_fieldset">
               <input class="input" type="password" name="password" placeholder="Enter Password">
            </fieldset>
            <fieldset class="registration_fieldset">
               <input class="input" type="password" name="password2" placeholder="Repeat Password">
            </fieldset>
            <button class="registration_button" type="submit">Join Us</button>
         </form>
         <a href="login.php">Already have an account?</a>
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
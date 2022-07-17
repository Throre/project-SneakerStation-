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
    <title>Sign In</title>
    <?php
        include "config/head.php";
    ?>
</head>
<body>
    <?php
        include "config/header.php"
    ?>
    <section class="login_background"> 
        <div class="log_in">
            <h2>Sign In</h2>
            <form class="registration_form" action="<?=$BASE_URL?>/api/user/signin.php" method="POST">
                <fieldset class="registration_fieldset">
                    <input class="input" type="text" name="email" placeholder="Enter Email">
                </fieldset>
                <fieldset class="registration_fieldset">
                    <input class="input" type="password" name="password" placeholder="Enter Password">
                </fieldset>
                <button class="registration_button" type="submit">Enter</button>
            </form>
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
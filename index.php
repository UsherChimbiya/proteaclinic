<?php
include "conf.php";
//include "seesion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--===== CSS =====-->
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Login| User</title>
</head>

<body>
    <div class="l-form">
        <form action="login.php" class="form">
            <h1 class="form__title">Log In</h1>

            <div class="form__div">
                <input type="text" class="form__input" name="full_name" placeholder="Enter Your Email ">
                <label for="full_name" class="form__label">Full Name</label>
            </div>

            <div class="form__div">
                <input type="text" name="email" class="form__input" placeholder="Enter Your Email">
                <label for="email" class="form__label"></label>
            </div>

            <input type="submit" class="form__button" value="Log In">
        </form>
    </div>
</body>

</html>
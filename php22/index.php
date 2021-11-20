<?php
session_start();
require_once "classes/User.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Wochenkarte</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5 col-sm-6 text-center">

    <?php
    if (!isset($_COOKIE['set'])) {
        ?>

        <h1 class="mt-5 text-center">Wochenkarte</h1>

        <h2 class="mt-5 text-center">Willkommen</h2>

        <p class="mt-5 text-center">Diese Webseite verwendet Cookies</p>
        <form id="form_cookie" action="cookieHelper.php" method="post">
            <input type="submit"
                   style="width: 40%; margin-left: 30%; margin-right: 30%"
                   name="cookie"
                   class="btn btn-warning btn-block"
                   value="Akzeptieren"
            />
        </form>

        <?php
    } else {
        if (User::isLoggedId()) {
            header("Location: wochenkarte.php");
        } else {
            $_COOKIE['set'] = true;
            header("Location: login.php");
        }
    }
    ?>

</div>
</body>
</html>

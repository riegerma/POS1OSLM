<?php
session_start();
require_once "classes/User.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Wochenkarte-Übersicht</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <?php
    if (!isset($_COOKIE['set'])) {
        header("Location: index.php");
    }
    if (User::isLoggedId()) {
        if (isset($_POST['logout'])) {
            User::logout();
        }
        ?>

        <h1 class="mt-5 text-center">Wochenkarte</h1>
        <div class="row">
            <div class="col-sm-4">
                <h3 class="mt-3 mb-2 text-center">Montag</h3>
                <img src="images/Montag.jpg" class="img-fluid rounded">
            </div>
            <div class="col-sm-4">
                <h3 class="mt-3 mb-2 text-center">Dienstag</h3>
                <img src="images/Dienstag.jpg" class="img-fluid rounded">
            </div>
            <div class="col-sm-4">
                <h3 class="mt-3 mb-2 text-center">Mittwoch</h3>
                <img src="images/Mittwoch.jpg" class="img-fluid rounded">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <h3 class="mt-3 mb-2 text-center">Donnerstag</h3>
                <img src="images/Donnerstag.jpg" class="img-fluid rounded">
            </div>
            <div class="col-sm-4">
                <h3 class="mt-3 mb-2 text-center">Freitag</h3>
                <img src="images/Freitag.jpg" class="img-fluid rounded">
            </div>
            <div class="col-sm-4">
                <h3 class="mt-3 mb-2 text-center">Samstag</h3>
                <img src="images/Samstag.jpg" class="img-fluid rounded">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <h3 class="mt-3 mb-2 text-center">Sonntag</h3>
                <img src="images/Sonntag.jpg" class="img-fluid rounded">
            </div>
        </div>

        <form id="form_logout" action="wochenkarte.php" method="post">
            <div class="mt-3 row">
                <div class="col-sm-12 form-group text-center">
                    <input type="submit"
                    name="logout"
                    class="btn btn-secondary"
                    value="Logout">
                </div>
            </div>
        </form>

        <?php
    } else{
        echo "Not logged in!!!";
    }
    ?>
</div>
</body>

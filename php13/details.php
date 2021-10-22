<!DOCTYPE html>
<head xmlns="http://www.w3.org/1999/html">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Benutzerdetails</title>

    <script type="text/javascript" src="js/index.js"></script>

</head>
<body>
<div class="container">
    <h1 class="mt-5 mb-3">Benutzerdetails</h1>
    <a href="index.php">zurück</a>
    <div class="table table-striped">
        <table>
            <?php
            require "PHP-13 userdata.php";
            $detailUser = getDataPerId($_GET['id']);
            echo "<tr><td>Vorname</td><td>" . $detailUser["firstname"] . "</td></tr>";
            echo "<tr><td>Nachname</td><td>" . $detailUser["lastname"] . "</td></tr>";
            echo "<tr><td>Geburtsdatum</td><td>" . dateFormatter($detailUser["birthdate"]) . "</td></tr>";
            echo "<tr><td>E-Mail</td><td>" . $detailUser["email"] . "</td></tr>";
            echo "<tr><td>Telefon</td><td>" . $detailUser["phone"] . "</td></tr>";
            echo "<tr><td>Straße</td><td>" . $detailUser["street"] . "</td></tr>";
            ?>
        </table>
    </div>

</div>
</body>

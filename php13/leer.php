<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Benutzerdaten</title>

    <script type="text/javascript" src="js/index.js"></script>

</head>

<body>
<?php
$filter = '';
$suche = '';
?>

<div class="container">
    <h1 class="mt-5 mb-3">Benutzerdaten anzeigen</h1>
    <form id="userData" action="index.php" method="post">
        <div class="row">
            <div class="col-sm-4 form-group">
                <label for="suche">Suche:</label>
                <input id="suche"
                       type="text"
                       name="suche"
                       value="<?= htmlspecialchars($suche) ?>"
                />
            </div>

            <div class="col-sm-2 form-group">
                <input type="submit"
                       id="submit"
                       class="btn btn-primary btn-block"
                       value="Suchen"
                       onclick="location.href='index.php'"
                />
            </div>

            <div class="col-sm-2 form-group">
                <input type="button"
                       class="btn btn-secondary btn-block"
                       id="leeren"
                       value="Leeren"
                       onclick="location.href='leer.php'"
                />

            </div>

        </div>
        <div class="row">

        </div>


    </form>

</div>
</body>

<?php


?>
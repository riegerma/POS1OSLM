<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>KundenInfo</title>

    <script type="text/javascript" src="js/index.js"></script>

</head>

<body>
<?php
$suche = ''
?>
<div class="container">
    <h1 class="mt-5">Kundeninfo</h1>
    <form id="kundenInfo">
        <table>
            <tr>
                <th>Name</th>
                <td>Kundenname hier</td>
            </tr>
            <tr>
                <th>Kontonummer</th>
                <td>Kontonummer hier</td>
            </tr>
            <tr>
                <th>Kontostand</th>
                <td>Kontostand hier</td>
            </tr>
        </table>
        <div class="row mt-4">
            <div class="col-sm-4">
                <input type="button"
                       class="btn btn-primary btn-block"
                       id="ueberweisung"
                       value="Neue Überweisung"
                       onclick="location.href='../ueberweisung/ueberweisung.php'"
                />
            </div>
            <div class="col-sm-4">
                <input type="button"
                       class="btn btn-primary btn-secondary"
                       id="logout"
                       value="Logout"
                       onclick="location.href='../index.php'"
                />
            </div>
        </div>
        <h2 class="mt-5">Letzte Überweisungen</h2>
        <div class="row mt-4">
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
                />
            </div>
        </div>
        <table>
            <tr>
                <th>Datum</th>
                <th>Betrag</th>
                <th>Empfänger</th>
                <th>Verwendungszweck</th>
            </tr>
        </table>
    </form>
</div>
</body>
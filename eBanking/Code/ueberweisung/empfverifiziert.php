<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>Überweisung</title>

    <script type="text/javascript" src="js/index.js"></script>

</head>

<body>
<?php
$empfaenger = '';
?>
<div class="container">
    <h1 class="mt-5">Neue Überweisung</h1>
    <h2>Kunde</h2>
    <form id="ueberweisung">
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
        <h2 class="mt-5">Empfänger</h2>
        <table>
            <tr>
                <th>Empfänger</th>
                <td>Kundenname hier</td>
            </tr>
            <tr>
                <th>Kontonummer</th>
                <td>Kontonummer hier</td>
            </tr>
        </table>
        <h2 class="mt-5">Betrag</h2>
        <div class="row">
            <div class="col-sm-4 form-group">
                <label for="betrag">Betrag:</label>
                <input id="suche"
                       type="number"
                       name="betrag"
                />
            </div>
            <div class="col-sm-2 form-group">
                <input type="button"
                       id="button"
                       class="btn btn-primary btn-block"
                       value="Überweisen"
                       onclick="location.href='../beleg/beleg.php'"
                />
            </div>
        </div>
        <div class="row mt-5">
            <input type="button"
                   class="btn btn-primary btn-secondary"
                   id="logout"
                   value="Logout"
                   onclick="location.href='../index.php'"
            />
        </div>
    </form>
</div>
</body>
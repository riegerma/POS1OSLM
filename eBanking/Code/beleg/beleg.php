<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>Beleg</title>

    <script type="text/javascript" src="js/index.js"></script>

</head>

<body>
<div class="container">
    <h1 class="mt-5">Überweisungs-Beleg</h1>
    <h2 class="mt-4">Sender</h2>
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
    <h2 class="mt-4">Empfänger</h2>
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
            <th>Betrag</th>
            <td>Betrag hier</td>
        </tr>
    </table>
    <div class="row mt-4">
        <div class="col-sm-4">
            <input type="button"
                   class="btn btn-primary btn-block"
                   id="drucken"
                   value="Drucken"
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
</div>
</body>
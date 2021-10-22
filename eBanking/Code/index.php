<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>eBanking</title>

    <script type="text/javascript" src="js/index.js"></script>

</head>

<body>
<div class="container">
    <h1 class="mt-5 mb-3">Anmeldung</h1>
    <form id="Login">
        <div class="row">
            <div class="col-sm-4">
                <input type="button"
                       class="btn btn-primary btn-block"
                       id="kunde"
                       value="Kunde"
                       onclick="location.href='kunde/kundeLogin.php'"
                />
            </div>
            <div class="col-sm-4">
                <input type="button"
                       class="btn btn-secondary btn-block"
                       id="angestellter"
                       value="Angestellter"
                       onclick="location.href='angestellter/angestellterLogin.php'"
                />
            </div>
        </div>
    </form>
</div>
</body>
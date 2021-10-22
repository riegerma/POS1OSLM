<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>KundenLogin</title>

    <script type="text/javascript" src="js/index.js"></script>

</head>

<body>
<?php
$name = '';
$pin = '';
$iban = ''
?>
<div class="container">
    <h1 class="mt-5">Neukunde</h1>
    <div class="row">
        <div class="col-sm-6 form-group">
            <label for="name">Name*</label>
            <input type="text"
                   name="name"
                   class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                   value="<?= htmlspecialchars($name) ?>"
                   maxlength="30"
                   required
            />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 form-group">
            <label for="pin">Pin*</label>
            <input type="password"
                   name="pin"
                   class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                   value="<?= htmlspecialchars($name) ?>"
                   maxlength="4"
                   required
            />
        </div>
        <div class="col-sm-3 form-group">
            <label for="pin">Pin bestätigen*</label>
            <input type="password"
                   name="pin"
                   class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                   value="<?= htmlspecialchars($name) ?>"
                   maxlength="4"
                   required
            />
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-sm-4">
            <input type="button"
                   class="btn btn-primary btn-block"
                   id="anmelden"
                   value="Anmelden"
                   onclick="location.href='kundenInfo.php'"
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

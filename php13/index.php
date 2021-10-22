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
            <table class="table table-striped">
                <tr>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Geburtsdatum</th>
                </tr>
                <?php
                require "PHP-13 userdata.php";
                $data = getAllData();

                if (isset($_POST['suche']) && $_POST['suche'] != "") {
                    $filtered = getFilteredData($_POST['suche']);
                    if (!isset($filtered[1])) {
                        echo "<p class='alert alert-danger'>Keine Einträge gefunden!</p>";
                    } else {
                        output($filtered);
                    }
                } else {
                    output($data);
                }

                function output($data)
                {
                    foreach ($data as $value) {
                        if ($value != NULL) {
                            $id = $value["id"];
                            echo "<tr><td><a href='details.php?id=$id'>" . $value["lastname"] . " " . $value["firstname"] . "</a></td>
                            <td>" . $value["email"] . "</td>
                            <td>" . dateFormatter($value["birthdate"]) . "</td></tr>";
                        }
                    }
                }

                ?>
            </table>
        </div>

    </form>

</div>
</body>

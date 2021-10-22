<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>BMI-Rechner</title>

    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="php12-zusatz/js/ampel.js"></script>

</head>

<body>
<div class="container">
    <h1 class="mt-5 mb-3">BMI-Rechner</h1>

    <?php
    require "lib/func.inc.php";

    $name = '';
    $date = '';
    $size = '';
    $weight = '';
    $bmi = '';

    if (isset($_POST['submit'])) {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $date = isset($_POST['date']) ? $_POST['date'] : '';
        $size = isset($_POST['size']) ? $_POST['size'] : '';
        $weight = isset($_POST['weight']) ? $_POST['weight'] : '';

        if (validate($name, $date, $size, $weight)) {
            echo "<p class='alert alert-success'>Die eingegebenen Daten sind korrekt!</p>";
        } else {
            echo "<div class='alert alert-danger'><p>Die eingegebenen Daten sind NICHT korrekt</p>";

            foreach ($errors as $key => $value) {
                echo "<li>" . $value . "</li>";
            }
            echo "</ul></div>";
        }
    }
    ?>

    <form id="form_bmi" action="index.php" method="post">
        <div class="form-row">
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-8 form-group">
                        <label for="name">Name*</label>
                        <input id="name"
                               type="text"
                               name="name"
                               class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                               value="<?= htmlspecialchars($name) ?>"
                               maxlength="25"
                               required
                        />
                    </div>

                    <div class="col-sm-4 form-group">
                        <label for="date">Messdatum*</label>
                        <input id="date"
                               type="date"
                               name="date"
                               class="form-control <?= isset($errors['date']) ? 'is-invalid' : '' ?>"
                               value="<?= htmlspecialchars($date) ?>"
                               onchange="validateDate(this)"
                               required
                        />
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="size">Größe (in cm):</label>
                        <input id="size"
                               type="number"
                               name="size"
                               class="form-control <?= isset($errors['size']) ? 'is-invalid' : '' ?>"
                               value="<?= htmlspecialchars($size) ?>"
                               min="100"
                               max="250"
                               onchange="calculateBmi()"
                               required
                        />
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="weight">Gewicht (in KG):</label>
                        <input id="weight"
                               type="number"
                               name="weight"
                               class="form-control <?= isset($errors['weight']) ? 'is-invalid' : '' ?>"
                               value="<?= htmlspecialchars($weight) ?>"
                               min="30"
                               max="350"
                               onchange="calculateBmi()"
                               required
                        />
                    </div>
                </div>


                <div class="col-sm-4 form-group">
                    <input type="submit"
                           name="submit"
                           class="btn btn-primary btn-block"
                           value="Validieren"
                    />
                </div>

                <div class="col-sm-4 form-group">
                    <a href="index.php" class="btn btn-secondary btn-block">Zurücksetzen</a>
                </div>
                <!--
                <?php

                if (isset($_POST['submit'])) {
                    (float)$bmi = (int)$weight / (((int)$size / 100) * ((int)$size / 100));
                    $bmi = number_format($bmi, 1);
                    if (isset($bmi)) {
                        $output = "Ihr BMI ist: " . (float)$bmi . ". ";

                        if ($bmi < 18.5) {
                            echo "<div class='alert alert-warning'>$output Sie sind untergewichtig!</div>";
                        } else if ($bmi >= 18.5 && $bmi < 25) {
                            echo "<div class='alert alert-success'>$output Ihr Gewicht ist normal!</div>";
                        } else if ($bmi >= 25 && $bmi < 30) {
                            echo "<div class='alert alert-warning'>$output Sie sind übergewichtig!</div>";
                        } else {
                            echo "<div class='alert alert-danger'>$output Sie haben Adipositas</div>";
                        }
                    }
                }

                ?>
                -->
            </div>


            <div class="col-sm-4">
                <img class="col-sm-12">
                <label for="text">
                    <h2>Info zum BMI:</h2>
                    <p>Unter 18.5 Untergewicht</p>
                    <p>18.5 - 24.9 Normal</p>
                    <p>25.0 - 29.9 Übergewicht</p>
                    <p>30.0 und darüber Adipositas</p>
                </label>
                <div id="ampel">
                    <script>
                        getAmpelImage(calculateBmi());
                    </script>
                </div>

                <!--
                <?php
                if ($bmi == '') {
                    echo '<img src="./php12-zusatz/images/ampel.png"/>';
                } else if (validate($name, $date, $size, $weight)) {
                    if ($bmi < 18.5) {
                        echo '<img src="./php12-zusatz/images/ampel_gelb.png"/>';
                    } else if ($bmi >= 18.5 && $bmi < 25) {
                        echo '<img src="./php12-zusatz/images/ampel_gruen.png"/>';
                    } else if ($bmi >= 25 && $bmi < 30) {
                        echo '<img src="./php12-zusatz/images/ampel_gelb.png"/>';
                    } else {
                        echo '<img src="./php12-zusatz/images/ampel_rot.png"/>';
                    }
                }

                ?>
            -->

            </div>
        </div>
</div>

</form>

</body>


</html>








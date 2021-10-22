<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Notenerfassung</title>

    <script type="text/javascript" src="js/index.js"></script>
</head>
<body>

<div class="container">

    <h1 class="mt-5 mb-3">Notenerfassung</h1>

    <?php

    require "lib/func.inc.php";

    $name = '';
    $email = '';
    $examDate = '';
    $grade = '';
    $subject = '';

    if(isset($_POST['submit'])){

        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $examDate = isset($_POST['examDate']) ? $_POST['examDate'] : '';
        $grade = isset($_POST['grade']) ? $_POST['grade'] : '';
        $subject = isset($_POST['subject']) ? $_POST['subject'] : '';

        if (validate($name, $email, $examDate, $subject, $grade)){
            echo "<p class='alert alert-success'>Die eingegebenen Daten sind korrekt</p>";
        } else {
            echo "<div class='alert alert-danger'><p>Die eingegebenen Daten sind NICHT korrekt</p>";

            foreach ($errors as $key => $value){
                echo "<li>" . $value . "</li>";
            }
            echo "</ul></div>";
        }
    }


    ?>


    <form id="form_grade" action="index.php" method="post">

        <div class="row">

            <div class="col-sm-6 form-group">
                <label for="name">Name*</label>
                <input type="text"
                    name="name"
                    class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($name) ?>"
                       maxlength="20"
                       required
                />
            </div>

            <div class="col-sm-6 form-group">
                <label for="email">E-Mail</label>
                <input type="email"
                       name="email"
                       class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                       value="<?= htmlspecialchars($email) ?>"
                />
            </div>
        </div>

            <div class="row">

                <div class="col-sm-4 form-group">
                    <label for="subject">Fach*</label>
                    <select name="subject"
                            class="form-control <?= isset($errors['subject']) ? 'is-invalid' : '' ?>"
                            required>
                        <option value="" hidden>- Fach auswählen -</option>
                        <option value="d" <?php if($subject == 'd') echo "selected='selected'"; ?>>DBI</option>
                        <option value="s" <?php if($subject == 's') echo "selected='selected'"; ?>>SYP</option>
                        <option value="f" <?php if($subject == 'f') echo "selected='selected'"; ?>>FSE</option>
                    </select>

                </div>

                <div class="col-sm-4 form-group">
                    <label for="grade">Note*</label>
                    <input type="number"
                            name="grade"
                            class="form-control <?= isset($errors['grade']) ? 'is-invalid' : '' ?>"
                           value="<?= htmlspecialchars($grade) ?>"
                           min="1"
                           max="5"
                           required
                    />
                </div>

                <div class="col-sm-4 form-group">
                    <label for="examDate">Prüfungsdatum*</label>
                    <input type="date"
                           name="examDate"
                           class="form-control <?= isset($errors['examDate']) ? 'is-invalid' : '' ?>"
                           value="<?= htmlspecialchars($examDate) ?>"
                           onchange="validateExamDate(this)"
                           required
                    />
                </div>
            </div>

        <div class="row mt-3">

            <div class="col-sm-3 mb-3">
                <input type="submit"
                       name="submit"
                       class="btn btn-primary btn-block"
                       value="Validieren"
                />
            </div>

            <div class="col-sm-3">
                <a href="index.php" class="btn btn-secondary btn-block">Löschen</a>
            </div>

        </div>



    </form>



</body>
</html>

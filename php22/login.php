<?php
session_start();
require_once "classes/User.php";

$email = '';
$password = '';
$message = '';

if (isset($_POST['submit'])) {
    $email = (isset($_POST['email']) ? $_POST['email'] : '');
    $password = (isset($_POST['password']) ? $_POST['password'] : '');

    $currentUser = new User($email, $password);
    if ($currentUser->validate()) {
        $currentUser = User::get($email, $password);

        if ($currentUser != null) {
            $currentUser->login();
        } else {
            $message .= "<div class='alert alert-danger form-control'><p>Daten falsch!</p></div>";
        }
    } else {
        $errors = $currentUser->getErrors();

        $message = "<div class='alert alert-danger'><p>Servervalidierung fehlgeschlagen!</p>";
        foreach ($errors as $error) {
            $message .= "<li>" . $error . "</li>";
        }
        $message .= "</ul></div>";
    }


}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Wochenkarte-Login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container col-sm-4">

    <h2 class="mt-5 text-center">Wochenkarte-Login</h2>
    <h3 class="mt-5">Bitte anmelden</h3>

    <div class="mt-4">
        <?= $message ?>
    </div>

    <form action="login.php" method="post" id="login">
        <div class="col-sm-12 form-group">
            <label for="email"></label>
            <input type="text"
                   name="email"
                   placeholder="E-Mail"
                   class="form-control"
                   value="<?= htmlspecialchars($email); ?>"
                   minlength="8"
                   maxlength="30"
                   required
            />
        </div>

        <div class="col-sm-12 form-group">
            <label for="password"></label>
            <input type="password"
                   name="password"
                   placeholder="Passwort"
                   class="form-control"
                   value="<?= htmlspecialchars($password); ?>"
                   minlength="4"
                   maxlength="30"
                   required
            />
        </div>
        <input type="submit"
               style="width: 40%; margin-left: 30%; margin-right: 30%"
               name="submit"
               class="btn btn-primary btn-block"
               value="Login"
        />
    </form>

</div>
</body>
</html>

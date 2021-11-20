<?php
session_start();

if (isset($_POST['cookie'])) {
    setcookie('set', true, time() + 60);
    header("Location: login.php");
} else {
    echo "<p>Something went wrong!!!!!!!!</p>";
}

?>
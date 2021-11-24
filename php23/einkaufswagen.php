<?php
//session_start();
require_once "classes/Book.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Einkaufswagen</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container mt-5 col-sm-4">
    <h1>Einkaufswagen</h1>
    <table>
        <?php
        $book = '';
        for ($i = 0; $i < count(Book::getAll()); $i++) {
            echo "For".$i;
            if (isset($_POST['dD'.$i]) && $_POST['dD' . $i] != 0) {
                $bookId = $_POST['bookId'.$i];
                $book = Book::get($bookId+1);
                echo "IF".$i;
            }
        }
        var_dump($book);
        ?>
    </table>
</div>
</body>
</html>
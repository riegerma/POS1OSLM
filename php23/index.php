<?php
session_start();
require_once "classes/Book.php";
require "classes/Cart.php";
require_once "classes/Cartitem.php";
$cart = new Cart();
$item = new Cartitem();

?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Warenkorb</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container mt-5 col-sm-4">
    <?php
    $numberOfBooks = count(Book::getAll());
    echo $numberOfBooks;
    for ($i = 0; $i < $numberOfBooks; $i++) {
        if (isset($_POST['submit'.$i])) {
            $cart->add($_POST['bookId'.$i], $_POST['dD'.$i]);
            header('Location: einkaufswagen.php');
        }
    }
    ?>

    <form action="einkaufswagen.php" method="post">
        <div class="form">

            <div class="form-group">
                <div class="row">
                    <h1 class="col-sm-8">Bücher</h1>

                    <input type="button"
                           class="btn btn-secondary col-sm-4"
                           id="warenkorb"
                           value="Warenkorb: <?php echo Cartitem::getCounter() ?>"
                           onclick="location.href='einkaufswagen.php'"
                </div>
            </div>
            <table>
                <?php
                $allBooks = Book::getAll();
                $i = 0;
                foreach ($allBooks as $book) {
//                    echo "<form>";
                    echo "<input type='hidden' name='bookId$i' value='$i'" . $book->getId() . "'>
                        <tr><td class='font-weight-bold'>" . $book->getTitle() . "</td></tr>
                        <tr><td> € " . $book->getPrice() . "</td></tr>";
                    echo "<tr><td colspan='80%'></td><td>Menge: </td><td>
                        <select name='dD$i' id='dD$i'>" . createDropDown($book->getInStock()) . "</select></td>
                        <td><button type='submit' name='submit'.$i id='submit'.$i value='hinzufuegen'>hinzufügen</button></td></tr></tr>";
                    echo "<tr style='border-bottom:1px solid black'><td colspan='100%'></td><td>";
//                    echo "</form>";
                    $i++;
                }

                function createDropDown($n)
                {
                    $options = '';
                    if ($n == 0) {
                        $options .= "<option id='count' value='0'>Ausverkauft</option>";
                    } else {
                        for ($i = 0; $i <= $n; $i++) {
                            $options .= "<option id='count' value='$i'>" . $i . "</option>";
                        }
                    }
                    return $options;
                }

                ?>
            </table>
        </div>
    </form>
</div>
</body>
</html>

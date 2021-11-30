<?php
session_start();
include "classes/Book.php";
include "classes/Cart.php";

$cart = new Cart();

for ($i = 1; $i <= count(Book::getAll()); $i++) {
    $submitName = "submit$i";
    if (isset($_POST[$submitName])) {
        echo "<script>alert('IF')</script>";
        $book = Book::get($i);
        var_dump($book);
        $cart->add($book, $_POST['select' . $i]);
        header("Location: einkaufswagen.php");
    }
    unset($_POST[$submitName]);
    unset($_POST['select' . $i]);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Warenkorb</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5 col-sm-4">
    <form action="index.php" method="post">
        <div class="form form-group">
            <div class="row">
                <h1 class="col-sm-8">Bücher</h1>
                <input type="button"
                       class="btn btn-secondary col-sm-4"
                       id="warenkorb"
                       value="Warenkorb: "
                       onclick="location.href='einkaufswagen.php'">
            </div>

            <table>
                <?php
                $allBooks = Book::getAll();
                $i = 1;
                $cartList = $cart->getList();
                foreach ($allBooks as $book) {
                    foreach ($cartList as $list){
                        if ($list->getBook()->getId() == $book->getId()){
                            $book->setInStock($book->getInStock() - $list->getAmount());
                        }
                    }
                    echo "<input type='hidden' name='id$i' value='id$i'" . $book->getId() . ">";
                    echo "<tr><td class='font-weight-bold'>" . $book->getTitle() . "</td></tr>";
                    echo "<td>€ " . $book->getPrice() . "</td>";
                    echo "<tr><td colspan='80%'>Menge: </td>";
                    echo "<td><select name='select$i' id='select$i'>" . createDropDown($book->getInStock()) . "</select></td>";
                    echo "<td><button type='submit' name='submit$i'>submit$i</button></td></tr>";
                    echo "<tr style='border-bottom:1px solid black'><td colspan='100%'></td><td>";
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

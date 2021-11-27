<?php
session_start();
include "classes/Book.php";
include "classes/Cartitem.php";
include "classes/Cart.php";

if (isset($_SESSION['cart'])) {

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
        <form action="einkaufswagen.php" method="post">
            <h1>Warenkorb</h1>
            <button type="button"
                    class="btn btn-secondary"
                    value="Zurück"
                    onclick="location.href= 'index.php'">Zurück
            </button>
            <table>
                <?php
                for ($i = 1; $i <= count(Book::getAll()); $i++) {
                    $submitName = "submit$i";
                    if (isset($_POST[$submitName])) {
                        echo "<script>alert('IF')</script>";
                        $book = Book::get($i);
                        $cart = unserialize($_SESSION['cart']);
                        $cart->add(new Cartitem($book, $_POST['select' . $i]), Cartitem::$counter);
                        header("Location: einkaufswagen.php");
                    }
                    unset($_POST[$submitName]);
                    unset($_POST['select'.$i]);
                }

                if (isset($_COOKIE['all'])) {
//                $size = sizeof(Cart::$list);
//                for ($i = 1; $i <= $size; $i++){
//                    $book = Book::get($_POST['id'.$i]);
//                }
                    $cartList = unserialize($_COOKIE['all']);
                    var_dump($cartList);
                    $j = 1;
                    foreach ($cartList as $item) {
                        $book = $item->getBook();
                        $amount = $item->getAmount();
                        echo "<tr><td class='font-weight-bold'>" . $book->getTitle() . "</td></tr>
                        <tr><td colspan='30%'>" . $book->getPrice() . " €/Stück </td>";
                        echo "<td colspan='40%'></td><td>Menge: $amount</td>";
                        echo "<td class='font-weight-bold' colspan='30%'>Preis: " . $book->getPrice() * $amount . "</td></tr>";
                        echo "<td><button type='submit' name='submitEW$j' id='submitEW$j' value='submitEW$j'>submitEW$j</button></td>";
                        echo "<tr style='border-bottom:1px solid black'><td colspan='100%'></td><td>";
                        $submitNameEW = "submitEW$j";
                        var_dump($submitNameEW);
                        echo $j;
                        if(isset($_POST[$submitNameEW])){
                            $cart = unserialize($_SESSION['cart']);
                            $cart->remove($j);
                            header("Location: einkaufswagen.php");
                        }
                        $j++;
                    }
                }
                ?>
            </table>
        </form>
    </div>
    </body>
    </html>
    <?php
}
?>
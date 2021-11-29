<?php
session_start();
include "classes/Cart.php";
include "classes/Book.php";

$cart = new Cart();

?>


<!doctype>
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
                onclick="location.href= 'index.php'"
        >Zurück
        </button>
        <table class="col-sm-8">
            <?php

            if (isset($_COOKIE['all'])) {
                $cartList = $cart->getList();
                var_dump($cartList);
                $j = 1;
                foreach ($cartList as $item) {
                    $book = $item->getBook();
                    $amount = $item->getAmount();
                    $submitNameEW = "submitEW$j";
                    if (isset($_POST[$submitNameEW])) {
                        $cart->remove($book->getId());
                        header("Location: einkaufswagen.php");
                    }
                    echo "<tr><td class='font-weight-bold'>" . $book->getTitle() . "</td></tr>
                        <tr><td colspan='30%'>" . $book->getPrice() . " €/Stück </td>";
                    echo "<td colspan='40%'></td><td>Menge: $amount</td>";
                    echo "<td class='font-weight-bold' colspan='30%'>Preis: " . $book->getPrice() * $amount . "</td></tr>";
                    echo "<td><button type='submit' name='submitEW$j' id='submitEW$j' value='submitEW$j'>submitEW$j</button></td>";
                    echo "<tr style='border-bottom:1px solid black'><td colspan='100%'></td><td>";
                    $j++;
                }

            }
            ?>
        </table>
    </form>
</div>
</body>
</html>

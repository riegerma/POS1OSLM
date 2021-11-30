# Testprotokoll

## index.php

Alle Bücher in Tabelle<br>
![Bücherliste](./images/index.jpg)

## einkaufswagen.php

leerer Warenkorb<br>
![Warenkorb leer](./images/warenkorb_leer.jpg)

Warenkorb befüllt<br>
![Warenkorb befüllt](./images/warenkorb_befuellt.jpg)

Anzahl der Artikel im Warenkorb wird auf index.php angezeigt<br>
![](./images/index_warenkorb_befuellt.jpg)

an der Optik könnte man noch was machen, aber die FUnktionalität steht im Vordergrund, denke ich

## Cookie

Cookie im Web-Speicher<br>
![Cookie](./images/cookie.jpg)

Inhalt des Cookies<br>
![Cookie Inhalt](./images/cookie_inhalt.jpg)

Inhalt des Cookies als var_dump()<br>
![Cookie var_dump](./images/cookie_var_dump.jpg)

## Stock

für jedes Buch in der Liste ist das DropDown zum Auswählen der Stückzahl an die Menge im Stock gebunden<br>
![Book Stock](./images/book_stock.jpg)

5 Stück des ersten Buches werden in den Warenkorb gelegt<br>
![5 Stk im Warenkorb](./images/book_warenkorb.jpg)

verfügbare Stückzahl im DropDown wird angepasst<br>
![3 Stk im DropDown](./images/book_stock_angepasst.jpg)

wenn ein Buch schon im Warenkorb liegt, wird die zusätzlich ausgewählte Stückzahl bei dem Buch im Warenkorb dazu gezählt<br>
![8 Stk im Warenkorb](./images/book_alle_im_warenkorb.jpg)

wenn kein Buch mehr verfügbar ist, ändert sich das DropDown zu "Ausverkauft". Die Anzeige hätte man auch anderst lösen können, aber für mich steht wieder die Funktionalität im Vordergrund<br>
![Buch ausverkauft](./images/book_ausverkauft.jpg)

## Preise

### Preis pro Position

für jede Position im Warenkorb wird der Gesamtpreis ausgegeben<br>
![Preis/Position](./images/preis_pro_position.jpg)

### Gesamtpreis

unter der Tablle mit den einzelnen Positionen wird der Gesamtpreis des Warenkorbs ausgegeben<br>
![Gesamtpreis](./images/preis_gesamt.jpg)

## Entfernen

jede Position im Warenkorb kann wieder entfernt werden<br>
![Position entfernen](./images/entfernen.jpg)
![Position entfernt](./images/entfernt.jpg)
der Gesamtpreis wird sofort neu berechnet<br>

die Stückzahl im DropDown wird wieder angepasst<br>
![Original Stückzahl](./images/book_stock_entfernt.jpg)

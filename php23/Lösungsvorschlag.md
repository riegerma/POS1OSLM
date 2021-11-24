# Warenkorb

## Grundaufbau

* index.php mit Liste der Bücher
* einkaufswagen.php mit hinzu gefügten Büchern

## Klassen

* Book-Attribute: id, title, price, inStock
   * getAll() gibt alle Bücher zurück
   * get($id) gibt ein bestimmtes Buch zurück
* Cart:
   * loadCookie() ladet gespeichrten Cookie mit Warenkorb
   * saveCookie() speichert Cookie mit Warenkorb
   * add($id, $count) fügt bestimmtes Buch in bestimmter Menge hinzu
   * remove($id) entfernt Buch aus Warenkorb
* Cartitem
   * Zwischenablage (vermittel zwischen Cart und Book)
   * evtl Counter für Bücher im Warenkorb

## index.php

laut Wireframe aufbauen\
Liste mit Büchern und verfügbare Menge dynamisch erzeugen\
bei jedem Buch ein Button "hinzufügen", der das Buch-Objekt dem Cart übergibt

## einkaufswagen.php

Bücher, die dem Warenkorb hinzu gefügt wurden, anzeigen\
Menge nochmal ändern oder Artikel löschen\
\
Umsetzung wird wieder spannend

# Benutzerdaten suchen

## Problemstellung

### Rolle
Du bist Webentwickler bei der Firma WebDesign GmbH in Imst.

### Situation
Für ein bekanntes Open-Source CMS soll eine Filterfunktion für Benutzerdaten entwickelt werden. Deine Arbeitskollegin aus der Graphikabteilung hat bereits zwei Mockups erstellt.

### Ziel
Dein Chef hat dich beauftragt einen funktionsfähigen Prototyp zum Filtern und Anzeigen von Benutzern zu erstellen. Die Daten werden derzeit in einem Array zur Verfügung gestellt, später werden diese direkt aus der Datenbank geladen.

### Zielgruppe
Die Filterfunktion soll nach erfolgreichen Tests in das CMS integriert und der Community kostenlos zur Verfügung gestellt werden. Die Anwender sind somit alle Backend-Administratoren welche das CMS einsetzen. Da die Entwickler-Community vor der Freigabe einen kritischen Blick auf den Code werfen wird, muss dieser allen aktuellen Regeln und Standards entsprechen. 

### Erwartetes Produkt
Der Filterfunktion für Benutzerdaten sollte mindestens folgendes umfassen:
* Darstellung der wichtigsten Benutzerdaten in Tabellenform (<table>)
  * Vorname und Nachname in gemeinsamer Spalte
  * Link auf die Detailseite mit Hilfe der Datensatz-ID z.B. href=“details.php?id=1“
  * Datumsformat DD.MM.YYYY
  * Zeilen farblich abwechselnd gestalten
* Eingabefeld zum Filtern nach Name und E-Mail
  * Tabellenzeilen werden entsprechend dem Suchfeld herausgefiltert
  * Eine Teilübereinstimmung des Suchtextes wird als Treffer gewertet
  * Buttons zum Suchen und Leeren (Tipp: zwei Formulare, kein JavaScript)
* Ausgabe einer Fehlermeldung falls keine Einträge gefunden wurden
* Responsive Design
* Verwendung eines HTML/CSS Frameworks, z.B. Bootstrap

Die Detailseite für Benutzerdaten sollte mindestens folgendes umfassen:
* Übersichtliche Darstellung aller Benutzerdaten
* Über einen zurück-Link wird der User wieder zur Übersichtsseite geleitet
Benutzerdaten:
* Die Benutzerdaten sollen über entsprechende Funktionen zur Verfügung gestellt werden
  * function getAllData()
  * function getDataPerId($id)
  * function getFilteredData($filter)


## Lösungsansatz

### Mockup erstellen
Als Erstes erstelle ich das Mockup für die Hauptseite.
Mit getAllData() werden alle JSON-Objekte als Array zurückgegeben.


### Benutzerdetails
Danach erstelle ich das Mockup für die Benutzerdetails.
Der "a href"-Tag im ersten Tabellenfeld schickt die ID des jeweiligen Benutzers an details.php.
```html
<body>
<div class="container">
    <h1 class="mt-5 mb-3">Benutzerdetails</h1>
    <a href="index.php">zurück</a>
    <div class="table table-striped">
        <table>
            <?php
            require "PHP-13 userdata.php";
            getDataPerId($_GET['id']);
            ?>
        </table>
    </div>

</div>
</body>
```

getDataPerId() gibt Benutzer mit übergebener ID zurück.
```php
function getDataPerId($id)
{
    $data = getAllData();
    $detailUser[] = '';

    foreach ((array)$data as $user) {
        if ((int)$user['id'] == $id) {
            $detailUser = $user;
        }
    }
    return $detailUser;

}
```

### Suche
Die Suchfunktion war das Schwierigste zum Implementieren. Ich hatte einige Probleme damit.
Schließlich bin ich auf eine Lösung gestoßen. Ist vielleicht nicht die schönste und elganteste Lösung, aber sie funktioniert.

```php
function getFilteredData($suche)
{
    $data = getAllData();
    $filteredUsers[] = NULL;

    foreach ($data as $value) {
        if (filter($value, $suche) != NULL)
            array_push($filteredUsers, filter($value, $suche));
    }


    return $filteredUsers;
}

function filter($user, $filter)
{
    $filtered = NULL;
    $filter = strtolower($filter);
    if (strpos(strtolower($user["firstname"]), $filter) > -1|| strpos(strtolower($user["lastname"]), $filter) > -1 || strpos(strtolower($user["email"]), $filter) > -1) {
        $filtered = $user;
    }
    return $filtered;
}
```
strpos() liefert entweder einer Integer oder false zurück.
Falls die gesuchte Sequenz am Anfang steht, liefert strpos() 0 zurück, daher Prüfung ob strpos() > -1.


### Ausgabe im index.php
```php
function output($data)
    {
        foreach ($data as $value) {
            if ($value != NULL) {
                $id = $value["id"];
                echo "<tr><td><a href='details.php?id=$id'>" . $value["lastname"] . " " . $value["firstname"] . "</a></td>
                <td>" . $value["email"] . "</td>
                <td>" . dateFormatter($value["birthdate"]) . "</td></tr>";
            }
        }
    }

```

### Leeren
Neue php-Datei "leer.php" erstellen. Der "Leeren"-Button in der index.php verweist auf diese Seite.
```html
<div class="col-sm-2 form-group">
    <input type="button"
            class="btn btn-secondary btn-block"
            id="leeren"
            value="Leeren"
            onclick="location.href='leer.php'"
            />

</div>
```

Die leer.php-Datei enthält nur das Suchfeld, den Such- und den Leerenbutton.
Wenn im Suchfeld etwas eingegeben wird und anschließend auf den Suchbutton gedrückt wird, wird die index.php aufgerufen und die Einträge werden gleich gefiltert.
leer.php:
```html
<div class="col-sm-2 form-group">
    <input type="submit"
        id="submit"
        class="btn btn-primary btn-block"
        value="Suchen"
        onclick="location.href='index.php'"
        />
</div>
```


### Ausgabe einer Fehlermeldung
Wie im Code oben zu erkennen ist, wird eine Fehlermeldung ausgegeben, wenn die $filteredUsers keine Einträge hat, sondern nur leere Keys die auf keine Values zeigen.
Wie schon erwähnt, wahrscheinlich nicht die eleganteste Lösung, aber sie funktioniert.

### Responsive Design
Responsive Design wurde mit Hilfe von Bootstrap umgesetzt.





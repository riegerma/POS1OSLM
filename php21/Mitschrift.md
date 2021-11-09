# Notenerfassung 2.0

## Problemstellung

### Deine Rolle

Du bist Webentwickler bei der Firma Awesome WebDesign in Imst.

### Die Situation

Der Landesschulrat für Tirol ist mit deinem Prototyp zur Notenerfassung sehr zufrieden und möchte einen weiteren Prototyp, welcher die eingegebenen Noten abspeichert und auflistet. Der Auftraggeber hat bereits ein weiters Mockup erstellt.

### Dein Ziel

Dein Chef hat dich beauftragt einen weiteren funktionsfähigen Prototyp für die Speicherung und Darstellung der Noten zu erstellen. Die eingegebenen Daten sollen als Objekt verwaltet und temporär serverseitig gespeichert werden.

### Deine Zielgruppe

Die Applikation soll von allen Lehrpersonen mit einem herkömmlichen Browser oder einem Mobilgerät verwendet werden können. 

### Das erwartete Produkt

Funktionen:
Der PHP-Prototyp sollte mindestens folgendes umfassen:
* Eingabe und Validierung der Noten
* Temporäre serverseitige Speicherung der Daten
* Löschfunktion um alle Noten zu löschen
* Vollständige Trennung von Darstellung und Geschäftslogik
* Model-Klasse für die Noteneintragung 
  * Beinhaltet alle notwendigen Datenfeldern und Methoden
  * Beinhaltet die gesamte Logik (Validierung, Speicherung, …)
* Responsive Design
* Verwendung eines HTML/CSS Frameworks, z.B. Bootstrap


## Lösungsansatz

Trennung zwischen Logik und Darstellung

Logik vollständig in Klasse GradeEntry

Formularverarbeitung bleibt in index.php -> nahe am Formular


### Klasse GradeEntry

-name: String  
-email: String  
-subject: String  
-grade: int  
-examDate: Date  
-errors: String[]  

+GradeEntry()  
+validate(): boolean  
-validateName(): boolean  
-validateEmail(): boolean  
-validateSubject(): boolean  
-validateGrad(): boolean  
-validateExamDate(): boolean  
+save(): void   //zuerst validieren dann speichern  
+getExamDateFormatted(): String  
+getSubjectFormatted(): String  
+getAll(): GradeEntry[] //Klassen-Methode  
+deleteAll(): void  //Klassen-Methode


### index.php

session_start() -> sonst keinen Zugriff auf die korrekte Session


### Darstellung der Noten

getAll() mit foreach-Schleife
Ausgabe in Tabellenform


### Löschen-Formular

eigenes clear.php erstellen

kontrollieren ob Formular mittels 'POST' abgeschickt wurde, dann deletAll() und redirect auf index.php


## Implementierung

Notenerfassung erweitern

1. Klasse erstellen
2. Formularverarbeitung anpassen
3. Anzeigen und löschen

### Models-Ordner

php-class: GradeEntry

Datenfelder mit leerem String initialisieren

Getter und Setter für alle Datenfelder erzeugen lassen

getAll()
deleteAll()
save()

Validierungsmethoden von php11 kopieren
nicht mehr mit Parametern sondern $this->datenfeldName

```php
validate(){
    return $this->validateName($this->name) & $this->validateEmail($this->email) & $this->validateExamDate($this->examDate) &
            $this->validateGrade($this->grade) & $this->validateSubject($this->subject);
}
```

#### Speichern

Daten werden temporär in Session abgespeichert


### index.php

erster Befehl muss
```php
session_start();
```
sein

```php
require_once "models/GradeEntry.php";

$e = new GradeEntry();
$message = '';

if (isset($_POST['submit'])) {

    $e->setName(isset($_POST['name']) ? $_POST['name'] : '');
    $e->setEmail(isset($_POST['email']) ? $_POST['email'] : '');
    $e->setExamDate(isset($_POST['examDate']) ? $_POST['examDate'] : '');
    $e->setGrade(isset($_POST['grade']) ? $_POST['grade'] : '');
    $e->setSubject(isset($_POST['subject']) ? $_POST['subject'] : '');

    if ($e->validate()) {
        $e->save();
        $message = "<p class='alert alert-success'>Die eingegebenen Daten sind korrekt</p>";
    } else {
        $message = "<div class='alert alert-danger'><p>Die eingegebenen Daten sind NICHT korrekt</p>";

        foreach ($e->getErrors() as $key => $value) {
            $message .= "<li>" . $value . "</li>";
        }
        $message .= "</ul></div>";
    }
}
```
alles noch vor <!DOCTYPE>




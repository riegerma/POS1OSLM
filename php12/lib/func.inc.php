<?php

$errors = [];
$dbhost = "localhost";
$dbuser = "root";
$db = "php12";
$bmi = 0;
$connection = "";

function validate ($name, $date, $size, $weight){
    return validateName($name) & validateDate($date) & validateSize($size) & validateWeigth($weight);
}


function validateName($name){
    global $errors;

    if(strlen($name) == 0){
        $errors['name'] = "Name darf nicht leer sein!";
        return false;
    } else if (strlen($name) > 25){
        $errors['name'] = "Name zu lang!";
        return false;
    } else {
        return true;
    }
}

function validateDate($date){
    global $errors;

    try{
        if ($date == ""){
            $errors['date'] = "Datum darf nicht leer sein";
            return false;
        } else if (new DateTime($date) > new DateTime()){
            $errors['date'] = "Messdatum darf nicht in der Zukunt liegen!";
            return false;
        } else {
            return true;
        }
    } catch (Exception $e){
        $errors['date'] = "Messdatum ungültig!";
        return false;
    }
}

function validateSize($size){
    global $errors;

    if (!is_numeric($size) || $size < 100 || $size > 250){
        $errors['size'] = "Größe ungültig";
        return false;
    } else {
        return true;
    }
}

function validateWeigth($weight){
    global $errors;

    if (!is_numeric($weight) || $weight < 30 || $weight > 350){
        $errors['weight'] = "Gewicht ungültig";
        return false;
    } else {
        return true;
    }
}



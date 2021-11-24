<?php

class Cartitem
{

    private static $counter = 0;
    public $list = [];

    public static function getCounter(){
        return self::$counter;
    }

    public static function increaseCounter(){
        self::$counter++;
    }

    public static function decreaseCounter(){
        self::$counter--;
    }
}
?>
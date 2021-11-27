<?php

class Cartitem
{

    public static $counter;
    private $book;
    private $amount;

    public function __construct($book, $amount)
    {
        $this->book = $book;
        $this->amount = $amount;
        self::$counter++;
    }

    public function getBook()
    {
        return $this->book;
    }

    public function getAmount()
    {
        return $this->amount;
    }
}

?>
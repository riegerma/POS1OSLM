<?php

class Cartitem
{

    private $book;
    private $amount;

    public function __construct($book, $amount)
    {
        $this->book = $book;
        $this->amount = $amount;
    }

    public function getBook()
    {
        return $this->book;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($new){
        $this->amount = $new;
    }

}

?>
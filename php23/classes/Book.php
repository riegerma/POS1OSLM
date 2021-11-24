<?php

class Book
{
    private $id = '';
    private $title = '';
    private $price = '';
    private $inStock = '';

    function __construct($id, $title, $price, $inStock){
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->inStock = $inStock;
    }

    public static function getAll(){
        $bookdata = json_decode(file_get_contents("json/PHP-23 bookdata.json"), false);
        $allBooks = array();
        foreach ($bookdata as $book) {
            array_push($allBooks, new Book($book->id, $book->title, $book->price, $book->stock));
        }
        return $allBooks;
    }

    public static function get($id){
        $allBooks = self::getAll();
        foreach ($allBooks as $book){
            if ($book->getId() == $id){
                return $book;
            }
        }
        return null;
    }

    public function decreaseInStock($n){
        $this->inStock -= $n;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getInStock(){
        return $this->inStock;
    }

    public function getId(){
        return $this->id;
    }
}

?>
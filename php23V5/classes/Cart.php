<?php
include "classes/Cartitem.php";

class Cart
{
    public $list;

    public function __construct()
    {
        $this->loadCookie();
    }

    private function loadCookie()
    {
        if (!isset($_COOKIE['all'])) {
            $this->list = [];
            setcookie('all', serialize($this->list), time() + 3600);
            header("Location: index.php");
        }
        return unserialize($_COOKIE['all']);
    }

    private function saveCookie()
    {
        setcookie('all', serialize($this->list), time() + 3600);
    }

    public function add($book, $count)
    {
        $this->list = $this->loadCookie();
        array_push($this->list, new Cartitem($book, $count));
        $this->saveCookie();
    }

    public function remove($id)
    {
        $this->list = $this->loadCookie();
        $i = 0;
        foreach ($this->list as $cartitem){
            if ($cartitem->getBook()->getId() == $id){
               unset($this->list[$i]);
            }
            $i++;
        }
        $this->list = array_values($this->list);
        $this->saveCookie();
    }

    public function getList()
    {
        return self::loadCookie();
    }
}
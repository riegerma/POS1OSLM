<?php

class Cart
{
    public static $list;

    public function __construct()
    {
//        self::$list = ['asdf'];
    }

    private function loadCookie()
    {
        if (!isset($_COOKIE['all'])) {
            setcookie("all", "", time() + 3600);
        }
        return unserialize($_COOKIE['all']);
    }

    private function saveCookie()
    {
        $serialized = serialize(self::$list);
        setcookie("all", $serialized, time() + 3600, "/");
    }

    public function add($book, $count)
    {
        self::$list = $this->loadCookie();
        self::$list[] = $book;
        $this->saveCookie();
    }

    public function remove($id)
    {
        self::$list = $this->loadCookie();
        echo "<script>alert('REMOVE')</script>";
        unset(self::$list[$id]);
        $this->saveCookie();
    }
}
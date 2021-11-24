<?php

class Cart
{

    private function loadCookie(){

    }

    private function saveCookie(){

    }

    public function add($book, $count){
        Cartitem::increaseCounter();
        setcookie($book, $count, time() + (86400 * 30));
    }

    public function remove($id){
        Cartitem::decreaseCounter();
    }
}

?>
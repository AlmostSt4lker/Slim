<?php

class Controller extends model

{

// users

    public function insertUser($uid, $email, $password)
    {
        $this->setUser($uid, $email, $password);
    }

    public function insertItem($name, $stock, $price)
    {
        $this->setItem($name, $stock, $price);
    }


}
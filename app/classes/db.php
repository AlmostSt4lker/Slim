<?php


class Db
{
    private $host='localhost';
    private $user='root';
    private $password='';
    private $dbname='mvctwig';

    protected function connect(){
        $pdo = new PDO('mysql:host=localhost;dbname=mvctwig', $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }

}
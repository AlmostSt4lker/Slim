<?php

use Slim\App;

class Model extends Db
{
    public function getNames(){

        $sql = "SELECT * FROM users WHERE email LIKE ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute('Adam');

        $results = $stmt->fetchAll();
        return $results;

//        $results = array (
//            'name' => 'Adam',
//        );

    }
}